<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Đăng nhập thành công.');
        }

        return back()
            ->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng.',
            ])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'customer'; // luôn là khách hàng, không cho client tự chọn quyền

        $user = User::create($data); // password được cast 'hashed' trong model User

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Đăng ký thành công.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
