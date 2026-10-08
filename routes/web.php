<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    $categories = \App\Models\Category::all();
    $books = \App\Models\Book::all();

    return view('home', compact('categories', 'books'));
});

// Danh sách sách
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