<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', [
            [
                'id' => 1,
                'name' => 'Sách Laravel Cơ Bản',
                'price' => 150000,
                'quantity' => 1
            ]
        ]);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', [
            [
                'id' => 1,
                'name' => 'Sách Laravel Cơ Bản',
                'price' => 150000,
                'quantity' => 1
            ]
        ]);

        if (empty($cart)) {
            return redirect()->route('checkout.index')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth()->id() ?? null,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'payment_method' => $request->payment_method,
                'total_price' => $total,
                'status' => 'pending'
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'] ?? 1,
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('checkout.success', ['id' => $order->id]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('order-success', compact('order'));
    }
}
