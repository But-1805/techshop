<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// --- TRANG NGƯỜI DÙNG ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/store', [PageController::class, 'store'])->name('store');
Route::get('/products/{product}', [PageController::class, 'show'])->name('products.show');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

// --- CÁC TRANG CẦN ĐĂNG NHẬP ---
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
    // Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/order-success', function () {
        return view('pages.order-success');
    })->name('order.success');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
});

// --- TRANG QUẢN TRỊ ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/order-success', function () {
        // Chỉ cho phép truy cập trang này nếu có session 'success'
        if (!session('success')) {
            return redirect('/');
        }
        return view('pages.order-success');
    })->name('order.success');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update'); // <- dòng này
});


// --- ROUTE XÁC THỰC MẶC ĐỊNH ---
Auth::routes();
