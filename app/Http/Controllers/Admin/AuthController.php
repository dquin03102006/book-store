<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'staff'], true)) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            if (in_array(Auth::user()->role, ['admin', 'staff'], true)) {
                $request->session()->regenerate();

                return redirect()->intended(route('admin.dashboard'));
            }

            Auth::logout();
        }

        return back()->withErrors(['email' => 'Email, mật khẩu không đúng hoặc không có quyền truy cập.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
