<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Hiển thị trang giao diện thanh toán
     */
    public function index()
    {
        return view('checkout.index'); 
    }

    /**
     * Xử lý khi người dùng bấm xác nhận đặt hàng
     */
    public function process(Request $request)
    {
        // Ở giai đoạn test UI/UX: validate dữ liệu cơ bản (nếu cần)
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        // Giả lập lưu đơn hàng và sinh ra mã đơn hàng ngẫu nhiên hoặc tự tăng (ví dụ: 101)
        $orderId = rand(100, 999);

        // Chuyển hướng sang trang thành công kèm theo mã đơn hàng
        return redirect()->route('checkout.success', ['order' => $orderId]);
    }

    /**
     * Hiển thị trang thông báo đặt hàng thành công
     */
    public function success($order)
    {
        return view('checkout.success', compact('order'));
    }

    /**
     * Hiển thị lịch sử đơn hàng (dùng dữ liệu mẫu phục vụ kiểm thử giao diện)
     */
    public function history()
    {
        $orders = [
            [
                'id' => 101,
                'created_at' => '2026-10-15 10:30:00',
                'total_price' => 150000,
                'status' => 'Đang xử lý'
            ],
            [
                'id' => 102,
                'created_at' => '2026-10-14 14:20:00',
                'total_price' => 320000,
                'status' => 'Đã giao hàng'
            ]
        ];

        return view('orders.history', compact('orders'));
    }
}