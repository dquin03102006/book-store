<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;

class ProfileController extends Controller
{
    // 1. Hiển thị trang quản lý thông tin cá nhân
    public function edit()
    {
        // Lấy user đang đăng nhập, nếu chưa đăng nhập thì lấy user đầu tiên trong CSDL để test giao diện
        $user = Auth::user() ?? User::first();
        
        return view('profile.edit', compact('user'));
    }

    // 2. Cập nhật thông tin cá nhân (Họ tên, Email)
    public function update(Request $request)
    {
        $user = Auth::user() ?? User::first();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Cập nhật thông tin tài khoản thành công!');
    }

    // 3. Đổi mật khẩu
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed', // Yêu cầu có input name="password_confirmation"
        ]);

        $user = Auth::user() ?? User::first();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }

    // 4. Xem lịch sử đơn hàng
    public function history()
    {
        $userId = Auth::id() ?? (User::first()?->id ?? 1);
        $orders = Order::where('user_id', $userId)->latest()->get();
        
        return view('orders.history', compact('orders'));
    }
}