<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/gioi-thieu', function () {
    return view('gioi-thieu');
});

Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;

Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware('admin');

Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::patch('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');

});