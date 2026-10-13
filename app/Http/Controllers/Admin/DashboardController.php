<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'Sản phẩm' => Book::count(),
            'Danh mục' => Category::count(),
            'Khách hàng' => User::where('role', 'customer')->count(),
            'Nhân viên' => User::where('role', 'staff')->count(),
            'Đơn hàng' => Order::count(),
        ];

        $lowStock = Book::with('category')->where('quantity', '<=', 5)->orderBy('quantity')->limit(10)->get();

        return view('admin.dashboard', compact('stats', 'lowStock'));
    }
}
