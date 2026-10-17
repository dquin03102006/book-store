<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $coupon = null;
        $discount = 0;
        $couponId = session('coupon_id');

        if ($couponId) {
            $coupon = Coupon::find($couponId);

            if ($coupon && $coupon->is_active) {
                $discount = $this->calculateDiscount($coupon, $total);
            } else {
                session()->forget(['coupon_id', 'coupon_code']);
                $coupon = null;
            }
        }

        return view('cart.index', compact('cart', 'total', 'coupon', 'discount'));
    }


    public function add(Request $request, $bookId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($bookId);
        $quantity = (int) $request->input('quantity', 1);
        // Mua ngay: chỉ thanh toán sách vừa chọn
        if ($request->input('buy_now') == '1') {
            $buyNowCart = [
                $bookId => [
                    'id' => $book->id,
                    'title' => $book->title,
                    'author' => $book->author,
                    'price' => $book->price,
                    'image' => $book->image,
                    'quantity' => $quantity,
                ],
            ];

            $request->session()->put('buy_now_cart', $buyNowCart);

            return redirect()->route('checkout.index', ['buy_now' => 1]);
        }

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$bookId])) {
            $cart[$bookId]['quantity'] += $quantity;
        } else {
            $cart[$bookId] = [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'price' => $book->price,
                'image' => $book->image,
                'quantity' => $quantity,
            ];
        }

        $request->session()->put('cart', $cart);

        // Nếu bấm Mua ngay thì chuyển thẳng tới thanh toán
        if ($request->input('buy_now') == '1') {
            return redirect()->route('checkout.index');
        }

        // Nếu bấm Thêm vào giỏ hàng thì chuyển về giỏ hàng
        if ($request->input('buy_now') == '1') {
            return redirect()->route('checkout.index', ['buy_now' => 1]);
        }
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'cart_count' => collect($cart)->sum('quantity'),
            ]);
        }
        return redirect()->back()->with('success', 'Đã thêm sách vào giỏ hàng!');
    }


    public function update(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = (int) $request->input('quantity');
            $cart[$id]['quantity'] = max(1, $quantity);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Đã cập nhật số lượng!');
    }

    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        unset($cart[$id]);

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:100'],
        ]);

        $code = strtoupper(trim($request->input('code')));
        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->withErrors(['code' => 'Giỏ hàng đang trống.']);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->first();

        if (!$coupon) {
            return back()->withErrors(['code' => 'Mã khuyến mãi không hợp lệ hoặc đã bị tắt.']);
        }

        if ($coupon->start_at && now()->lt($coupon->start_at)) {
            return back()->withErrors(['code' => 'Mã khuyến mãi chưa đến thời gian áp dụng.']);
        }

        if ($coupon->end_at && now()->gt($coupon->end_at)) {
            return back()->withErrors(['code' => 'Mã khuyến mãi đã hết hạn.']);
        }

        if ($coupon->quantity !== null && $coupon->quantity <= 0) {
            return back()->withErrors(['code' => 'Mã khuyến mãi đã hết lượt sử dụng.']);
        }

        if ($total < (float) $coupon->min_order_amount) {
            return back()->withErrors([
                'code' => 'Đơn hàng chưa đạt giá trị tối thiểu ' .
                    number_format($coupon->min_order_amount, 0, ',', '.') . ' đ.',
            ]);
        }

        session([
            'coupon_id' => $coupon->id,
            'coupon_code' => $coupon->code,
        ]);

        return redirect()->route('cart.index')
            ->with('success', 'Áp dụng mã khuyến mãi thành công!');
    }

    public function removeCoupon()
    {
        session()->forget(['coupon_id', 'coupon_code']);

        return redirect()->route('cart.index')
            ->with('success', 'Đã gỡ mã khuyến mãi.');
    }

    private function calculateDiscount(Coupon $coupon, float $total): float
    {
        if ($total < (float) $coupon->min_order_amount) {
            return 0;
        }

        if ($coupon->discount_type === 'percent') {
            $discount = $total * (float) $coupon->discount_value / 100;
        } else {
            $discount = (float) $coupon->discount_value;
        }

        return round(min($total, max(0, $discount)));
    }
}
