
<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/danh-muc/{id}', [HomeController::class, 'category']);

Route::get('/gioi-thieu', function () {
    $categories = DB::table('categories')->get();
    return view('gioi-thieu', compact('categories'));
});

Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/order-success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('books', AdminBookController::class)->except('show');
        Route::resource('customers', CustomerController::class)->parameters(['customers' => 'user']);

        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('staff', StaffController::class)->except('show')->parameters(['staff' => 'user']);
    });
});
