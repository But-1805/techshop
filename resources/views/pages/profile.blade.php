@extends('layouts.app')
@section('title', 'Hồ Sơ Của Tôi')
@section('content')
    <!-- Phần nội dung chính (Main) -->
    <main class="container mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Cột Menu bên trái -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="font-bold text-lg mb-4">Tài Khoản</h3>
                    <ul class="space-y-2" id="account-nav">
                        <li>
                            <a href="#info"
                                class="account-nav-item active flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100 transition-colors"
                                data-target="account-info">Thông tin cá nhân</a>
                        </li>
                        <li>
                            <a href="#orders"
                                class="account-nav-item flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100 transition-colors"
                                data-target="order-history">Lịch sử đơn hàng</a>
                        </li>
                        <li>
                            <a href="#password"
                                class="account-nav-item flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100 transition-colors"
                                data-target="change-password">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a href="#"
                                class="account-nav-item flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100 transition-colors text-red-600">Đăng
                                xuất</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Cột Nội dung bên phải -->
            <section class="lg:col-span-3">
                <!-- Tab: Thông tin cá nhân (hiển thị mặc định) -->
                <div id="account-info" class="account-content bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-8 text-center">
                        Thông Tin Cá Nhân
                    </h2>
                    <div class="flex flex-col items-center mb-8">
                        <div class="w-28 h-28 rounded-full bg-gray-200 mb-4 overflow-hidden">
                            <img src="https://placehold.co/200x200/EFEFEF/333333?text=Avatar" alt="Ảnh đại diện"
                                class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-xl font-bold">Nguyễn Văn A</h3>
                        <p class="text-gray-500">nguyenvana@email.com</p>
                    </div>
                    <div class="border-t pt-6 space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">Số điện thoại</p>
                            <p class="font-semibold">090xxxxxxx</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Địa chỉ mặc định</p>
                            <p class="font-semibold">
                                123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh
                            </p>
                        </div>
                        <button data-target="edit-account-info"
                            class="mt-8 bg-black text-white font-bold py-2 px-6 rounded-lg hover:bg-gray-800 transition-colors">
                            Chỉnh sửa thông tin
                        </button>
                    </div>
                </div>

                <!-- Tab: Chỉnh sửa thông tin (ẩn) -->
                <div id="edit-account-info" class="account-content hidden bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Chỉnh Sửa Thông Tin</h2>
                    <form action="#" class="space-y-6">
                        <div>
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" id="fullname" class="form-input" value="Nguyễn Văn A" />
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-input" value="nguyenvana@email.com" />
                        </div>
                        <div>
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" id="phone" class="form-input" value="090xxxxxxx" />
                        </div>
                        <div>
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" id="address" class="form-input"
                                value="123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh" />
                        </div>
                        <div class="flex gap-4 pt-4">
                            <button type="submit"
                                class="w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">
                                Lưu Thay Đổi
                            </button>
                            <button type="button" data-target="account-info"
                                class="w-full bg-gray-200 text-black font-bold py-3 rounded-lg hover:bg-gray-300 transition-colors">
                                Hủy
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tab: Lịch sử đơn hàng (ẩn) -->
                <div id="order-history" class="account-content hidden bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Lịch Sử Đơn Hàng</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-3">Mã Đơn</th>
                                    <th class="p-3">Ngày Đặt</th>
                                    <th class="p-3">Tổng Tiền</th>
                                    <th class="p-3">Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">#12534</td>
                                    <td class="p-3">05/06/2025</td>
                                    <td class="p-3 font-semibold">28.570.000₫</td>
                                    <td class="p-3">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Đã
                                            giao</span>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">#12499</td>
                                    <td class="p-3">28/05/2025</td>
                                    <td class="p-3 font-semibold">1.850.000₫</td>
                                    <td class="p-3">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Đã
                                            giao</span>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">#12601</td>
                                    <td class="p-3">10/06/2025</td>
                                    <td class="p-3 font-semibold">18.990.000₫</td>
                                    <td class="p-3">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Đang
                                            xử lý</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Đổi mật khẩu (ẩn) -->
                <div id="change-password" class="account-content hidden bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Đổi Mật Khẩu</h2>
                    <form action="#" class="space-y-6 max-w-sm">
                        <div>
                            <label for="old_password" class="form-label">Mật khẩu cũ</label><input type="password"
                                id="old_password" class="form-input" />
                        </div>
                        <div>
                            <label for="new_password" class="form-label">Mật khẩu mới</label><input type="password"
                                id="new_password" class="form-input" />
                        </div>
                        <div>
                            <label for="confirm_new_password" class="form-label">Xác nhận mật khẩu mới</label><input
                                type="password" id="confirm_new_password" class="form-input" />
                        </div>
                        <button type="submit"
                            class="w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">
                            Lưu Thay Đổi
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
