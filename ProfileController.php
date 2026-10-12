<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => ['nullable', 'regex:/^(0|\+84)[0-9]{9}$/'],
            'address' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.regex'   => 'Số điện thoại không hợp lệ.',
        ]);

        $request->user()->update($data);

        return back()->with('success', 'Cập nhật thông tin thành công.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|string|min:6|confirmed',
        ], [
            'current_password.current_password' => 'Mật khẩu hiện tại không đúng.',
            'password.min'                      => 'Mật khẩu mới tối thiểu 6 ký tự.',
            'password.confirmed'                => 'Xác nhận mật khẩu không khớp.',
        ]);

        $request->user()->update(['password' => $request->password]);

        return back()->with('success', 'Đổi mật khẩu thành công.');
    }
}
