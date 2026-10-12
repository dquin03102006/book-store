<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function show()
    {
        // GIẢ ĐỊNH: bảng cart_items có cột user_id, book_id, quantity (của Lài).
        $cart = DB::table('cart_items')->where('user_id', auth()->id())->get();

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('error', 'Giỏ hàng đang trống.');
        }

        $books = Book::whereIn('id', $cart->pluck('book_id'))->get()->keyBy('id');

        $subtotal = $cart->sum(fn ($row) => $books[$row->book_id]->price * $row->quantity);

        return view('checkout.show', [
            'cart'     => $cart,
            'books'    => $books,
            'subtotal' => $subtotal,
            'user'     => auth()->user(),
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        $cart = DB::table('cart_items')->where('user_id', auth()->id())->get();

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('error', 'Giỏ hàng đang trống.');
        }

        try {
            $order = DB::transaction(function () use ($request, $cart) {
                $subtotal = 0;
                $lines    = [];

                foreach ($cart as $row) {
                    // Khóa dòng để 2 người mua cùng lúc không làm âm tồn kho
                    $book = Book::lockForUpdate()->findOrFail($row->book_id);

                    if ($book->quantity < $row->quantity) {
                        throw new \Exception('Sách "' . $book->title . '" không đủ số lượng trong kho.');
                    }

                    $book->decrement('quantity', $row->quantity);
                    $subtotal += $book->price * $row->quantity;

                    $lines[] = [
                        'book_id'  => $book->id,
                        'quantity' => $row->quantity,
                        'price'    => $book->price, // giá tại thời điểm mua, lấy từ DB
                    ];
                }

                $discount = 0;

                if ($request->filled('coupon_code')) {
                    $coupon = DB::table('coupons')
                        ->where('code', $request->coupon_code)
                        ->lockForUpdate()
                        ->first();

                    $now = now();

                    if (! $coupon
                        || ! $coupon->is_active
                        || $coupon->quantity <= 0
                        || $now->lt($coupon->start_at)
                        || $now->gt($coupon->end_at)
                        || $subtotal < $coupon->min_order_amount) {
                        throw new \Exception('Mã giảm giá không hợp lệ hoặc không đủ điều kiện.');
                    }

                    $discount = $coupon->discount_type === 'percent'
                        ? round($subtotal * $coupon->discount_value / 100, 2)
                        : $coupon->discount_value;

                    $discount = min($discount, $subtotal);

                    DB::table('coupons')->where('id', $coupon->id)->decrement('quantity');
                }

                $order = Order::create([
                    'user_id'          => auth()->id(),
                    'total_amount'     => $subtotal - $discount,
                    'status'           => 'pending',
                    'shipping_name'    => $request->shipping_name,
                    'shipping_phone'   => $request->shipping_phone,
                    'shipping_address' => $request->shipping_address,
                    'payment_method'   => $request->payment_method,
                ]);

                $order->items()->createMany($lines);

                DB::table('cart_items')->where('user_id', auth()->id())->delete();

                return $order;
            });
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('checkout.success', $order)->with('success', 'Đặt hàng thành công.');
    }

    public function success(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        return view('checkout.success', compact('order'));
    }
}
