<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán và giỏ hàng
    public function index(Request $request)
    {
        $isBuyNow = $request->boolean('buy_now');

        $cart = $isBuyNow
            ? session()->get('buy_now_cart', [])
            : session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total', 'isBuyNow'));
    }

    // Xử lý lưu đơn hàng khi người dùng bấm "Xác Nhận Đặt Hàng"
    public function process(Request $request)
    {
        // Validate dữ liệu, yêu cầu shipping_phone phải là số và đúng chính xác 10 chữ số
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|digits:10|regex:/^[0-9]+$/',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
        ], [
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại người nhận.',
            'shipping_phone.digits' => 'Số điện thoại phải bao gồm chính xác 10 chữ số.',
            'shipping_phone.regex' => 'Số điện thoại chỉ được phép chứa các chữ số.',
        ]);

        $isBuyNow = $request->input('buy_now') == '1';

        $cart = $isBuyNow
            ? session()->get('buy_now_cart', [])
            : session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('checkout.index')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        try {
            DB::beginTransaction();

            // Tạo đơn hàng chính
            $order = Order::create([
                'user_id' => auth()->id(),
                'shipping_name' => $request->shipping_name,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            // Lưu chi tiết sản phẩm vào bảng order_items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item['id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            // Xóa giỏ hàng sau khi đặt thành công
            if ($isBuyNow) {
                session()->forget('buy_now_cart');
            } else {
                session()->forget('cart');
            }

            return redirect()->route('checkout.success', ['id' => $order->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // Trang thông báo đặt hàng thành công
    public function success($id)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);
        return view('order-success', compact('order'));
    }
}
