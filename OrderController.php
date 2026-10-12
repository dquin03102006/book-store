<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        $order->load('items.book');

        return view('orders.show', compact('order'));
    }

    public function cancel(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        if ($order->status !== 'pending') {
            return back()->with('error', 'Chỉ hủy được đơn đang chờ xác nhận.');
        }

        DB::transaction(function () use ($order) {
            foreach ($order->items as $item) {
                Book::where('id', $item->book_id)->increment('quantity', $item->quantity); // hoàn kho
            }
            $order->update(['status' => 'cancelled']);
        });

        return back()->with('success', 'Đã hủy đơn hàng.');
    }
}
