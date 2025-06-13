@extends('layouts.app')
@section('title', 'Giỏ Hàng')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold mb-8">Giỏ Hàng Của Bạn</h1>

        @if (Cart::count() == 0)
            <div class="text-center py-16 bg-white rounded-lg shadow-md">
                <h2 class="mt-6 text-2xl font-semibold">Giỏ hàng của bạn đang trống</h2>
                <a href="{{ route('store') }}"
                    class="mt-6 inline-block bg-black text-white font-bold py-3 px-8 rounded-lg">Bắt đầu mua sắm</a>
            </div>
        @else
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Cột danh sách sản phẩm -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
                    @foreach (Cart::content() as $item)
                        <div class="flex flex-col md:flex-row items-center gap-4 border-b pb-4 mb-4">
                            <img src="{{ $item->options->image ? Storage::url($item->options->image) : 'https://placehold.co/150x150' }}"
                                alt="{{ $item->name }}" class="w-24 h-24 object-contain rounded-md">
                            <div class="flex-grow">
                                <h3 class="font-semibold text-lg">{{ $item->name }}</h3>
                            </div>

                            {{-- Form cập nhật số lượng --}}
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST"
                                class="flex items-center gap-3">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->qty }}"
                                    class="w-16 text-center border rounded-md" min="1">
                                <button type="submit" class="text-sm hover:underline text-blue-600">Cập nhật</button>
                            </form>

                            <p class="font-bold text-lg w-36 text-right">{{ number_format($item->subtotal, 0, ',', '.') }}₫
                            </p>

                            {{-- Link xóa sản phẩm --}}
                            <a href="{{ route('cart.remove', $item->rowId) }}"
                                class="text-gray-400 hover:text-red-500">&times;</a>
                        </div>
                    @endforeach
                </div>

                <!-- Cột tóm tắt đơn hàng -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-28">
                        <h2 class="text-2xl font-bold border-b pb-4 mb-4">Tóm Tắt Đơn Hàng</h2>
                        <div class="flex justify-between mb-3 text-gray-600">
                            <span>Tạm tính</span>
                            <span>{{ Cart::subtotal() }}₫</span>
                        </div>
                        <div class="flex justify-between font-bold text-xl border-t pt-4">
                            <span>Tổng cộng</span>
                            <span>{{ Cart::total() }}₫</span>
                        </div>
                        <a href="{{ route('checkout') }}"
                            class="block text-center mt-6 w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800">Tiến
                            Hành Thanh Toán</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
