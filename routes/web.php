<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Định nghĩa route login tạm thời để tránh lỗi Route [login] not defined
Route::get('/login', function () {
    return view('auth.login'); // Hoặc trả về chuỗi thông báo nếu chưa có view login
})->name('login');

// 5. Tài khoản người dùng - Đăng ký
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// 4. Thanh toán (Checkout)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');

// 5. Tài khoản người dùng - Lịch sử đơn hàng cá nhân (Yêu cầu đăng nhập)
Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});