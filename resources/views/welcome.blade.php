@extends('layouts.app')
@section('title', 'Trang Chủ Tech Shop')
@section('content')
    <main class="container mx-auto px-4 py-8">
        <!-- Banner quảng cáo -->
        <section class="mb-10">
            <div class="bg-gray-200 rounded-lg h-64 md:h-96 flex items-center justify-center">
                <img src="https://placehold.co/1200x400/000000/FFFFFF?text=KHUYẾN+MÃI+CỰC+SỐC" alt="Banner Khuyến Mãi"
                    class="w-full h-full object-cover rounded-lg" />
            </div>
        </section>

        <!-- Phần sản phẩm nổi bật -->
        <section>
            <h2 class="text-3xl font-bold mb-6">Sản Phẩm Nổi Bật</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Mẫu 1 sản phẩm -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="p-4 bg-gray-100">
                        <img src="https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm" alt="Tên sản phẩm"
                            class="w-full h-40 object-contain group-hover:scale-105 transition-transform" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold h-12">Điện thoại ABC Pro Max 256GB</h3>
                        <p class="text-xl font-bold text-red-600 mt-2">25.990.000₫</p>
                        <p class="text-sm text-gray-500 line-through">29.990.000₫</p>
                        <button
                            class="mt-4 w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
                <!-- Copy mẫu sản phẩm trên để thêm nhiều sản phẩm -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="p-4 bg-gray-100">
                        <img src="https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm" alt="Tên sản phẩm"
                            class="w-full h-40 object-contain group-hover:scale-105 transition-transform" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold h-12">Laptop XYZ Gaming 16 inch</h3>
                        <p class="text-xl font-bold text-red-600 mt-2">32.500.000₫</p>
                        <p class="text-sm text-gray-500 line-through">35.000.000₫</p>
                        <button
                            class="mt-4 w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="p-4 bg-gray-100">
                        <img src="https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm" alt="Tên sản phẩm"
                            class="w-full h-40 object-contain group-hover:scale-105 transition-transform" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold h-12">Tai nghe không dây BassBoost</h3>
                        <p class="text-xl font-bold text-red-600 mt-2">1.290.000₫</p>
                        <p class="text-sm text-gray-500 line-through">1.590.000₫</p>
                        <button
                            class="mt-4 w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="p-4 bg-gray-100">
                        <img src="https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm" alt="Tên sản phẩm"
                            class="w-full h-40 object-contain group-hover:scale-105 transition-transform" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold h-12">Tablet Pro 11 inch M3</h3>
                        <p class="text-xl font-bold text-red-600 mt-2">18.990.000₫</p>
                        <p class="text-sm text-gray-500 line-through">21.000.000₫</p>
                        <button
                            class="mt-4 w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="p-4 bg-gray-100">
                        <img src="https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm" alt="Tên sản phẩm"
                            class="w-full h-40 object-contain group-hover:scale-105 transition-transform" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold h-12">Đồng hồ thông minh Fit 5</h3>
                        <p class="text-xl font-bold text-red-600 mt-2">4.590.000₫</p>
                        <p class="text-sm text-gray-500 line-through">5.190.000₫</p>
                        <button
                            class="mt-4 w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
