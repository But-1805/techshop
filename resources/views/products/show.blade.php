@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <!-- Phần nội dung chính (Main) -->
    <main class="container mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <nav class="text-sm mb-6">
            <a href="#" class="hover:underline">Trang chủ</a> >
            <a href="#" class="hover:underline">Điện thoại</a> >
            <span class="font-semibold">Điện thoại ABC Pro Max 256GB</span>
        </nav>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Cột hình ảnh sản phẩm -->
                <div>
                    <div class="mb-4 border rounded-lg overflow-hidden">
                        <img id="main-image" src="https://placehold.co/600x600/EEEEEE/000000?text=Ảnh+Chính"
                            alt="Main product image" class="w-full h-full object-cover" />
                    </div>
                    <div class="grid grid-cols-5 gap-2" id="thumbnail-container">
                        <img src="https://placehold.co/100x100/EEEEEE/000000?text=Ảnh+1" alt="Thumbnail 1"
                            class="thumbnail w-full cursor-pointer border-2 border-transparent rounded-md active" />
                        <img src="https://placehold.co/100x100/DDDDDD/000000?text=Ảnh+2" alt="Thumbnail 2"
                            class="thumbnail w-full cursor-pointer border-2 border-transparent rounded-md" />
                        <img src="https://placehold.co/100x100/CCCCCC/000000?text=Ảnh+3" alt="Thumbnail 3"
                            class="thumbnail w-full cursor-pointer border-2 border-transparent rounded-md" />
                        <img src="https://placehold.co/100x100/BBBBBB/000000?text=Ảnh+4" alt="Thumbnail 4"
                            class="thumbnail w-full cursor-pointer border-2 border-transparent rounded-md" />
                    </div>
                </div>

                <!-- Cột thông tin và mua hàng -->
                <div>
                    <h1 class="text-3xl font-bold mb-2">
                        Điện thoại ABC Pro Max 256GB
                    </h1>
                    <div class="mb-4">
                        <span class="text-3xl font-bold text-red-600">25.990.000₫</span>
                        <span class="text-lg text-gray-500 line-through ml-2">29.990.000₫</span>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Trải nghiệm hiệu năng đỉnh cao với chip A20 Bionic, màn hình
                        ProMotion 120Hz siêu mượt và hệ thống camera chuyên nghiệp.
                    </p>

                    <!-- Các tùy chọn -->
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="font-semibold">Màu sắc:</label>
                            <div class="flex gap-2 mt-2">
                                <button class="w-8 h-8 rounded-full bg-black border-2 border-black"></button>
                                <button class="w-8 h-8 rounded-full bg-white border-2"></button>
                                <button class="w-8 h-8 rounded-full bg-blue-900 border-2"></button>
                            </div>
                        </div>
                        <div>
                            <label class="font-semibold">Dung lượng:</label>
                            <div class="flex gap-2 mt-2">
                                <button class="border border-black bg-black text-white px-4 py-1 rounded-md">
                                    256GB
                                </button>
                                <button class="border px-4 py-1 rounded-md">512GB</button>
                                <button class="border px-4 py-1 rounded-md">1TB</button>
                            </div>
                        </div>
                    </div>
                    <!-- Nút mua hàng -->
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- (Tùy chọn) Thêm input cho số lượng nếu bạn muốn --}}
                        {{-- <input type="number" name="quantity" value="1" min="1"> --}}

                        <div class="flex flex-col gap-3 mt-6">
                            <button type="submit"
                                class="w-full bg-black text-white font-bold py-4 rounded-lg hover:bg-gray-800">Thêm vào giỏ
                                hàng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mô tả chi tiết và thông số -->
            <div class="border-t mt-12 pt-8">
                <h2 class="text-2xl font-bold mb-4">Mô Tả Sản Phẩm</h2>
                <p class="text-gray-700 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </main>
@endsection
