<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Auth;

// --- TRANG NGƯỜI DÙNG ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/store', [PageController::class, 'store'])->name('store');
Route::get('/products/{product}', [PageController::class, 'show'])->name('products.show');

// --- GIỎ HÀNG ---
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// --- CÁC TRANG CẦN ĐĂNG NHẬP ---
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/order-success', function () {
        return view('pages.order-success');
    })->name('order.success');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
});

// --- TRANG QUẢN TRỊ ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    // Thêm các route quản lý khác ở đây
});

// --- ROUTE XÁC THỰC MẶC ĐỊNH ---
Auth::routes();
