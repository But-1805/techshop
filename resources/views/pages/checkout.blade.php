@extends('layouts.app')
@section('title', 'Thanh Toán')
@section('content')
    <!-- Phần nội dung chính (Main) -->
    <main class="container mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Cột bên trái: Thông tin thanh toán và giao hàng -->
            <div>
                <h1 class="text-2xl font-bold mb-6">Thông Tin Thanh Toán</h1>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="fullname" class="form-label">Họ và tên</label>
                        <input type="text" id="fullname" name="fullname" class="form-input" required />
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" class="form-input" required />
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input" required />
                        </div>
                    </div>
                    <div>
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Số nhà, tên đường"
                            class="form-input" required />
                    </div>

                    <h2 class="text-xl font-bold pt-4">Phương thức vận chuyển</h2>
                    <div class="border rounded-lg p-4 flex justify-between items-center">
                        <label for="shipping" class="flex items-center">
                            <input type="radio" id="shipping" name="shipping_method"
                                class="h-4 w-4 text-black focus:ring-black border-gray-300" checked />
                            <span class="ml-3">Giao hàng tận nơi</span>
                        </label>
                        <span class="font-semibold">Miễn phí</span>
                    </div>

                    <h2 class="text-xl font-bold pt-4">Phương thức thanh toán</h2>
                    <div class="border rounded-lg">
                        <div class="p-4 border-b">
                            <label for="cod" class="flex items-center">
                                <input type="radio" id="cod" name="payment_method"
                                    class="h-4 w-4 text-black focus:ring-black border-gray-300" checked />
                                <span class="ml-3 font-semibold">Thanh toán khi nhận hàng (COD)</span>
                            </label>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-b-lg">
                            <p class="text-sm text-gray-600">
                                Bạn sẽ thanh toán bằng tiền mặt hoặc chuyển khoản trực tiếp
                                cho nhân viên giao hàng.
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Cột bên phải: Tóm tắt đơn hàng -->
            <div class="bg-white rounded-lg shadow-md p-6 h-fit sticky top-12">
                <h2 class="text-2xl font-bold border-b pb-4 mb-4">
                    Đơn Hàng Của Bạn
                </h2>

                <!-- Danh sách sản phẩm trong đơn hàng -->
                <div class="space-y-4">
                    <!-- Sản phẩm 1 -->
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="https://placehold.co/80x80/EEEEEE/000000?text=Sản+Phẩm" alt="Sản phẩm 1"
                                class="w-20 h-20 object-contain rounded-md border" />
                            <span
                                class="absolute -top-2 -right-2 bg-gray-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">1</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-semibold">Điện thoại ABC Pro Max 256GB</h3>
                        </div>
                        <p class="font-semibold">25.990.000₫</p>
                    </div>
                    <!-- Sản phẩm 2 -->
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="https://placehold.co/80x80/EEEEEE/000000?text=Sản+Phẩm" alt="Sản phẩm 2"
                                class="w-20 h-20 object-contain rounded-md border" />
                            <span
                                class="absolute -top-2 -right-2 bg-gray-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">2</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-semibold">Tai nghe không dây BassBoost</h3>
                        </div>
                        <p class="font-semibold">2.580.000₫</p>
                    </div>
                </div>

                <!-- Tổng tiền -->
                <div class="border-t mt-6 pt-4 space-y-3">
                    <div class="flex justify-between text-gray-600">
                        <span>Tạm tính</span>
                        <span>28.570.000₫</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Phí vận chuyển</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="flex justify-between font-bold text-xl border-t pt-4 mt-2">
                        <span>Tổng cộng</span>
                        <span>28.570.000₫</span>
                    </div>
                </div>

                <button
                    class="mt-6 w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">
                    Hoàn Tất Đơn Hàng
                </button>
            </div>
        </div>
    </main>
@endsection
