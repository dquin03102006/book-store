
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
use App\Http\Controllers\CartController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SupportMessageController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NewsController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('books.search');
Route::get('/danh-muc/{id}', [HomeController::class, 'category']);

Route::get('/gioi-thieu', function () {
    $categories = DB::table('categories')->get();
    return view('gioi-thieu', compact('categories'));
});

Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('support-messages', [SupportMessageController::class, 'index'])
            ->name('support-messages.index');

        Route::patch('support-messages/{id}/status', [SupportMessageController::class, 'updateStatus'])
            ->name('support-messages.updateStatus');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('books', AdminBookController::class)->except('show');
        Route::resource('banners', BannerController::class)->except('show');
        Route::resource('customers', CustomerController::class)->parameters(['customers' => 'user']);

        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');
        Route::get('orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('staff', StaffController::class)->except('show')->parameters(['staff' => 'user']);
        Route::resource('news', NewsController::class)->except('show');
    });
});
// Checkout - Thanh toán
// Checkout - Thanh toán (yêu cầu đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/process', [\App\Http\Controllers\CheckoutController::class, 'process'])
        ->name('checkout.process');

    Route::get('/checkout/success/{id}', [\App\Http\Controllers\CheckoutController::class, 'success'])
        ->name('checkout.success');
});
// Lịch sử đơn hàng
Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [\App\Http\Controllers\OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/my-orders/{id}', [\App\Http\Controllers\OrderController::class, 'show'])
        ->name('orders.show');

    // Hồ sơ cá nhân
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{bookId}', [CartController::class, 'add'])
    ->name('cart.add');

Route::put('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])
    ->name('cart.applyCoupon');

Route::post('/cart/remove-coupon', [CartController::class, 'removeCoupon'])
    ->name('cart.removeCoupon');

// Hỗ trợ khách hàng
Route::get('/support', [SupportController::class, 'index'])
    ->name('support.index');

Route::post('/support', [SupportController::class, 'store'])
    ->name('support.store');
// Nạp route đăng nhập, đăng ký và đăng xuất của TV3
require __DIR__ . '/auth.php';
