@extends('layouts.app')
@section('title', 'Giỏ Hàng')
@section('content')
    <!-- Phần nội dung chính (Main) -->
    <main class="container mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold mb-8">Giỏ Hàng Của Bạn</h1>

        <!-- Giao diện giỏ hàng có sản phẩm -->
        <div id="cart-with-items" class="grid lg:grid-cols-3 gap-8">
            <!-- Cột danh sách sản phẩm -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">

                <!-- Sản phẩm 1 -->
                <div class="cart-item flex flex-col md:flex-row items-center gap-4 border-b pb-4 mb-4">
                    <img src="https://placehold.co/150x150/EEEEEE/000000?text=Sản+Phẩm+1" alt="Sản phẩm 1"
                        class="w-24 h-24 object-contain rounded-md">
                    <div class="flex-grow">
                        <h3 class="font-semibold text-lg">Điện thoại ABC Pro Max 256GB</h3>
                        <p class="text-sm text-gray-500">Màu: Đen Titan</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="quantity-btn" data-action="decrease">-</button>
                        <input type="text" class="quantity-input w-12 text-center border rounded-md" value="1"
                            data-price="25990000">
                        <button class="quantity-btn" data-action="increase">+</button>
                    </div>
                    <p class="item-total font-bold text-lg w-36 text-right">25.990.000₫</p>
                    <button class="remove-item text-gray-400 hover:text-red-500">&times;</button>
                </div>

                <!-- Sản phẩm 2 -->
                <div class="cart-item flex flex-col md:flex-row items-center gap-4 border-b pb-4 mb-4">
                    <img src="https://placehold.co/150x150/EEEEEE/000000?text=Sản+Phẩm+2" alt="Sản phẩm 2"
                        class="w-24 h-24 object-contain rounded-md">
                    <div class="flex-grow">
                        <h3 class="font-semibold text-lg">Tai nghe không dây BassBoost</h3>
                        <p class="text-sm text-gray-500">Màu: Trắng</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="quantity-btn" data-action="decrease">-</button>
                        <input type="text" class="quantity-input w-12 text-center border rounded-md" value="2"
                            data-price="1290000">
                        <button class="quantity-btn" data-action="increase">+</button>
                    </div>
                    <p class="item-total font-bold text-lg w-36 text-right">2.580.000₫</p>
                    <button class="remove-item text-gray-400 hover:text-red-500">&times;</button>
                </div>

                <div class="text-right mt-4">
                    <a href="#" class="text-black font-semibold hover:underline">← Tiếp tục mua sắm</a>
                </div>
            </div>

            <!-- Cột tóm tắt đơn hàng -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-28">
                    <h2 class="text-2xl font-bold border-b pb-4 mb-4">Tóm Tắt Đơn Hàng</h2>
                    <div class="flex justify-between mb-3 text-gray-600">
                        <span>Tạm tính</span>
                        <span id="subtotal">28.570.000₫</span>
                    </div>
                    <div class="flex justify-between mb-4 text-gray-600">
                        <span>Phí vận chuyển</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="flex justify-between font-bold text-xl border-t pt-4">
                        <span>Tổng cộng</span>
                        <span id="grand-total">28.570.000₫</span>
                    </div>
                    <button
                        class="mt-6 w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">Tiến
                        Hành Thanh Toán</button>
                </div>
            </div>
        </div>

        <!-- Giao diện giỏ hàng trống (ẩn mặc định) -->
        <div id="empty-cart" class="hidden text-center py-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-24 w-24 text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h2 class="mt-6 text-2xl font-semibold">Giỏ hàng của bạn đang trống</h2>
            <p class="text-gray-500 mt-2">Hãy bắt đầu mua sắm để lấp đầy giỏ hàng nhé!</p>
            <a href="#"
                class="mt-6 inline-block bg-black text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-800 transition">Bắt
                đầu mua sắm</a>
        </div>
    </main>
@endsection
