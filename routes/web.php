<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route đăng nhập toàn cục phục vụ hệ thống
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// --- KHU VỰC KHÁCH HÀNG ---
Route::middleware([])->group(function () {
    // Quản lý thông tin cá nhân & Đổi mật khẩu
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lịch sử đơn hàng
    Route::get('/my-orders', [CheckoutController::class, 'history'])->name('orders.history');
    Route::get('/my-orders/{order}', [CheckoutController::class, 'show'])->name('orders.show');

    // Giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');

    // Thanh toán (Checkout)
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});

// --- KHU VỰC QUẢN TRỊ ADMIN ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');     
    Route::post('login', [AuthController::class, 'login'])->name('login.submit'); 
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('books', BookController::class)->except('show');
        Route::resource('customers', CustomerController::class)->parameters(['customers' => 'user']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('staff', StaffController::class)->except('show')->parameters(['staff' => 'user']);
    });
});