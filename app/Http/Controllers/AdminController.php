<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ==============================
        // 1. THỐNG KÊ TỔNG QUAN
        // ==============================

        $totalOrders = Order::count();

        $totalRevenue = Order::where('status', 'completed')
            ->sum('total_amount');

        $pendingOrders = Order::where('status', 'pending')
            ->count();

        $processingOrders = Order::where('status', 'processing')
            ->count();

        $shippedOrders = Order::where('status', 'shipped')
            ->count();

        $completedOrders = Order::where('status', 'completed')
            ->count();

        $cancelledOrders = Order::where('status', 'cancelled')
            ->count();


        // ==============================
        // 2. DOANH THU THEO THÁNG
        // ==============================

        $monthlyRevenue = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                DB::raw('SUM(total_amount) as revenue')
            )
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        // ==============================
        // 3. DOANH THU THEO DANH MỤC
        // ==============================

        $revenueByCategory = OrderItem::join(
                'orders',
                'order_items.order_id',
                '=',
                'orders.id'
            )
            ->join(
                'books',
                'order_items.book_id',
                '=',
                'books.id'
            )
            ->leftJoin(
                'categories',
                'books.category_id',
                '=',
                'categories.id'
            )
            ->where('orders.status', 'completed')
            ->select(
                DB::raw("COALESCE(categories.name, 'Chưa phân loại') as category_name"),
                DB::raw('SUM(order_items.quantity) as quantity'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            )
            ->orderByDesc('revenue')
            ->get();


        // ==============================
        // 4. DOANH THU THEO SẢN PHẨM
        // ==============================

        $revenueByProduct = OrderItem::join(
                'orders',
                'order_items.order_id',
                '=',
                'orders.id'
            )
            ->join(
                'books',
                'order_items.book_id',
                '=',
                'books.id'
            )
            ->where('orders.status', 'completed')
            ->select(
                'books.title',
                DB::raw('SUM(order_items.quantity) as quantity'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
            )
            ->groupBy(
                'books.id',
                'books.title'
            )
            ->orderByDesc('revenue')
            ->limit(10)
            ->get();


        // ==============================
        // 5. DOANH THU THEO KHÁCH HÀNG
        // ==============================

        $revenueByCustomer = Order::leftJoin(
                'users',
                'orders.user_id',
                '=',
                'users.id'
            )
            ->where('orders.status', 'completed')
            ->select(
                DB::raw("COALESCE(users.name, 'Khách vãng lai') as customer_name"),
                DB::raw("COALESCE(users.email, '') as customer_email"),
                DB::raw('COUNT(orders.id) as total_orders'),
                DB::raw('SUM(orders.total_amount) as revenue')
            )
            ->groupBy(
                'users.id',
                'users.name',
                'users.email'
            )
            ->orderByDesc('revenue')
            ->limit(10)
            ->get();


        // ==============================
        // 6. DOANH THU THEO THANH TOÁN
        // ==============================

        $revenueByPayment = Order::where('status', 'completed')
            ->select(
                'payment_method',
                DB::raw('COUNT(id) as total_orders'),
                DB::raw('SUM(total_amount) as revenue')
            )
            ->groupBy('payment_method')
            ->orderByDesc('revenue')
            ->get();


        // ==============================
        // TRẢ DỮ LIỆU SANG VIEW
        // ==============================

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',

            'pendingOrders',
            'processingOrders',
            'shippedOrders',
            'completedOrders',
            'cancelledOrders',

            'monthlyRevenue',

            'revenueByCategory',
            'revenueByProduct',
            'revenueByCustomer',
            'revenueByPayment'
        ));
    }
}