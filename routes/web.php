<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportController;

// ====================
// TRANG CHỦ
// ====================
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// ====================
// DANH SÁCH SÁCH
// ====================
Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

// ====================
// GIỎ HÀNG
// ====================

// Xem giỏ hàng
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

// Thêm sách vào giỏ
Route::post('/cart/add/{bookId}', [CartController::class, 'add'])
    ->name('cart.add');

// Cập nhật số lượng
Route::put('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

// Xóa sản phẩm khỏi giỏ
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

// ====================
// KHUYẾN MÃI
// ====================

// Áp dụng mã khuyến mãi
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])
    ->name('cart.applyCoupon');

// Gỡ mã khuyến mãi
Route::post('/cart/remove-coupon', [CartController::class, 'removeCoupon'])
    ->name('cart.removeCoupon');

// ====================
// HỖ TRỢ KHÁCH HÀNG
// ====================

// Hiển thị trang hỗ trợ
Route::get('/support', [SupportController::class, 'index'])
    ->name('support.index');

// Gửi yêu cầu hỗ trợ
Route::post('/support', [SupportController::class, 'store'])
    ->name('support.store');
