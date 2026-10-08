<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();

        $totalRevenue = Order::where('status', 'completed')
            ->sum('total_amount');

        $pendingOrders = Order::where('status', 'pending')
            ->count();

        $completedOrders = Order::where('status', 'completed')
            ->count();

        $cancelledOrders = Order::where('status', 'cancelled')
            ->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'pendingOrders',
            'completedOrders',
            'cancelledOrders'
        ));
    }
}