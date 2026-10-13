<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán
    public function index()
    {
        $user = Auth::user();
        // Lấy giỏ hàng của user (giả sử lưu trong bảng cart_items hoặc session)
        $cartItems = DB::table('cart_items')
            ->join('books', 'cart_items.book_id', '=', 'books.id')
            ->where('cart_items.user_id', $user->id)
            ->select('cart_items.*', 'books.title', 'books.price')
            ->get();
/*
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống!');
        }
*/
        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('checkout.index', compact('cartItems', 'total', 'user'));
    }

    // Xử lý lưu đơn hàng vào Database
    public function process(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:cod,vnpay,momo',
        ]);

        $user = Auth::user();
        
        $cartItems = DB::table('cart_items')
            ->join('books', 'cart_items.book_id', '=', 'books.id')
            ->where('cart_items.user_id', $user->id)
            ->select('cart_items.*', 'books.price')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $totalAmount = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        // Sử dụng Database Transaction để đảm bảo tính toàn vẹn dữ liệu
        $orderId = DB::transaction(function () use ($request, $user, $cartItems, $totalAmount) {
            // 1. Tạo đơn hàng trong bảng orders
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $user->id,
                'shipping_name' => $request->shipping_name,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'total_amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Lưu chi tiết đơn hàng vào bảng order_items
            foreach ($cartItems as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'book_id' => $item->book_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 3. Xóa giỏ hàng sau khi đặt hàng thành công
            DB::table('cart_items')->where('user_id', $user->id)->delete();

            return $orderId;
        });

        // Nếu chọn thanh toán online (VNPAY/Momo), điều hướng sang cổng thanh toán giả lập/sandbox ở đây.
        // Tạm thời với đồ án, ta chuyển hướng thẳng đến trang thành công (COD).
        return redirect()->route('checkout.success', ['order' => $orderId])
            ->with('success', 'Đặt hàng thành công!');
    }

    // Trang thông báo đặt hàng thành công
    public function success($orderId)
    {
        $order = DB::table('orders')->where('id', $orderId)->where('user_id', Auth::id())->first();
        
        if (!$order) {
            abort(404);
        }

        $orderItems = DB::table('order_items')
            ->join('books', 'order_items.book_id', '=', 'books.id')
            ->where('order_items.order_id', $orderId)
            ->select('order_items.*', 'books.title')
            ->get();

        return view('checkout.success', compact('order', 'orderItems'));
    }
}
