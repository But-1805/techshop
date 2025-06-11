@extends('layouts.app')
@section('title', 'Cửa Hàng')
@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Cột Bộ lọc bên trái -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-28">
                    <h2 class="text-xl font-bold mb-4">Bộ Lọc</h2>

                    <!-- Lọc theo danh mục -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Danh Mục</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="#" class="text-gray-600 hover:text-black hover:font-semibold">Tất cả</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-black hover:font-semibold">Điện
                                    thoại</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-black hover:font-semibold">Laptop</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-black hover:font-semibold">Tablet</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Lọc theo giá -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Mức Giá</h3>
                        <ul class="space-y-2">
                            <li>
                                <label class="flex items-center"><input type="radio" name="price"
                                        class="h-4 w-4 text-black focus:ring-black border-gray-300" />
                                    <span class="ml-2">Dưới 2 triệu</span></label>
                            </li>
                            <li>
                                <label class="flex items-center"><input type="radio" name="price"
                                        class="h-4 w-4 text-black focus:ring-black border-gray-300" />
                                    <span class="ml-2">Từ 2 - 10 triệu</span></label>
                            </li>
                            <li>
                                <label class="flex items-center"><input type="radio" name="price"
                                        class="h-4 w-4 text-black focus:ring-black border-gray-300" />
                                    <span class="ml-2">Từ 10 - 20 triệu</span></label>
                            </li>
                            <li>
                                <label class="flex items-center"><input type="radio" name="price"
                                        class="h-4 w-4 text-black focus:ring-black border-gray-300" />
                                    <span class="ml-2">Trên 20 triệu</span></label>
                            </li>
                        </ul>
                    </div>

                    <button
                        class="w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        Áp Dụng
                    </button>
                </div>
            </aside>

            <!-- Cột Lưới sản phẩm bên phải -->
            <div class="lg:col-span-3">
                <h1 class="text-3xl font-bold mb-6">Tất Cả Sản Phẩm</h1>
                {{-- trong welcome.blade.php hoặc store.blade.php --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    @foreach ($products as $product)
                        {{-- Gọi component product-card và truyền dữ liệu sản phẩm vào --}}
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                {{-- Thêm code phân trang cho trang store (chỉ có ở store.blade.php) --}}
                @if (method_exists($products, 'links'))
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
