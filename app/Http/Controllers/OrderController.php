<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng của user đang đăng nhập
    public function index()
    {
        $userId = auth()->id() ?? 1; // Fallback an toàn khi test
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    // Xem chi tiết một đơn hàng cụ thể
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}