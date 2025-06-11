<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route cho các trang công khai
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/store', [PageController::class, 'store'])->name('store');
Route::get('/products/{product}', [PageController::class, 'show'])->name('products.show');

// Route cho các trang cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/cart', [PageController::class, 'cart'])->name('cart');
    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
});

// Các route xác thực của Laravel UI (giữ nguyên)
Auth::routes();

// === ADMIN ROUTES ===
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route cho trang dashboard của admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Chúng ta sẽ thêm các route quản lý sản phẩm, đơn hàng... vào đây sau
});
