@extends('layouts.app')
@section('title', 'Thanh Toán')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <form id="checkout-form" action="{{ route('checkout.placeOrder') }}" method="POST">
            @csrf
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Cột thông tin -->
                <div>
                    <h1 class="text-2xl font-bold mb-6">Thông Tin Thanh Toán</h1>
                    <div class="space-y-6 bg-white p-6 rounded-lg shadow-md">
                        <div>
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" id="name" name="name" class="form-input"
                                value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" id="phone" name="phone" class="form-input"
                                    value="{{ auth()->user()->phone }}" required>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-input"
                                    value="{{ auth()->user()->email }}" required>
                            </div>
                        </div>
                        <div>
                            <label for="ship_address" class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" id="ship_address" name="ship_address" class="form-input"
                                value="{{ auth()->user()->address }}" required>
                        </div>
                    </div>
                </div>

                <!-- Cột tóm tắt đơn hàng -->
                <div class="bg-white rounded-lg shadow-md p-6 h-fit sticky top-28">
                    <h2 class="text-2xl font-bold border-b pb-4 mb-4">Đơn Hàng Của Bạn</h2>
                    <div class="space-y-4">
                        @foreach (Cart::content() as $item)
                            <div class="flex items-center gap-4">
                                <img src="{{ $item->options->image ? Storage::url($item->options->image) : 'https://placehold.co/80x80' }}"
                                    alt="{{ $item->name }}" class="w-16 h-16 object-contain rounded-md border">
                                <div class="flex-grow">
                                    <h3 class="font-semibold">{{ $item->name }} <span class="text-gray-500">x
                                            {{ $item->qty }}</span></h3>
                                </div>
                                <p class="font-semibold">{{ number_format($item->subtotal, 0, ',', '.') }}₫</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t mt-6 pt-4 space-y-3">
                        <div class="flex justify-between font-bold text-xl">
                            <span>Tổng cộng</span>
                            <span>{{ Cart::total(0, ',', '.') }}₫</span>
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-6 w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800">Hoàn Tất Đơn
                        Hàng</button>
                </div>
            </div>
        </form>
    </div>
@endsection
