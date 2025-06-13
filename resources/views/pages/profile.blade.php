@extends('layouts.app')
@section('title', 'Hồ Sơ Của Tôi')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Cột Menu bên trái -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <div class="text-center">
                        <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://placehold.co/200x200/EFEFEF/333333?text=' . substr(Auth::user()->name, 0, 1) }}"
                            alt="Ảnh đại diện" class="w-28 h-28 rounded-full bg-gray-200 mb-4 object-cover mx-auto">
                        <h3 class="text-xl font-bold">{{ Auth::user()->name }}</h3>
                        <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data"
                            class="mt-4" x-data="{ newAvatarName: '' }">
                            @csrf
                            <div class="flex flex-col items-center">
                                <label for="avatar"
                                    class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg inline-flex items-center text-sm">
                                    <span>Chọn ảnh</span>
                                </label>
                                <input id="avatar" type="file" name="avatar" class="hidden"
                                    @change="newAvatarName = $event.target.files[0] ? $event.target.files[0].name : ''">
                                <span x-text="newAvatarName" class="text-sm text-gray-500 mt-2"></span>
                                <button type="submit" x-show="newAvatarName" style="display: none;"
                                    class="mt-2 text-sm text-blue-600 hover:underline font-semibold">Lưu ảnh</button>
                            </div>
                            @error('avatar')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </form>
                    </div>
                    <ul class="space-y-2 mt-6" id="account-nav">
                        <li><a href="#info" class="account-nav-item active flex items-center gap-3 p-3 rounded-lg"
                                data-target="account-info">Thông tin cá nhân</a></li>
                        <li><a href="#orders" class="account-nav-item flex items-center gap-3 p-3 rounded-lg"
                                data-target="order-history">Lịch sử đơn hàng</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Cột Nội dung bên phải -->
            <section class="lg:col-span-3">
                {{-- Tab: Thông tin cá nhân --}}
                <div id="account-info" class="account-content bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Chỉnh Sửa Thông Tin</h2>
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                            <input type="text" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                            <input type="text" id="address" name="address"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                value="{{ old('address', $user->address) }}">
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <p class="font-semibold">Đổi mật khẩu (để trống nếu không muốn thay đổi)</p>
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu
                                cũ</label>
                            <input type="password" id="current_password" name="current_password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu
                                mới</label>
                            <input type="password" id="new_password" name="new_password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Xác
                                nhận mật khẩu mới</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <button type="submit"
                            class="bg-black text-white font-bold py-2 px-6 rounded-lg hover:bg-gray-800">Lưu Thay
                            Đổi</button>
                    </form>
                </div>

                {{-- Tab: Lịch sử đơn hàng --}}
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
                                @forelse ($orders as $order)
                                    <tr class="border-b">
                                        <td class="p-3 font-mono">#{{ $order->id }}</td>
                                        <td class="p-3">
                                            {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}</td>
                                        <td class="p-3 font-semibold">
                                            {{ number_format($order->final_total, 0, ',', '.') }}₫</td>
                                        <td class="p-3"><span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($order->status) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-3 text-center text-gray-500">Bạn chưa có đơn hàng nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">{{ $orders->links() }}</div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- Script để chuyển tab --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.account-nav-item');
            const contentPanels = document.querySelectorAll('.account-content');

            navLinks.forEach(link => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    const targetId = link.dataset.target;

                    navLinks.forEach(nav => nav.classList.remove('active', 'bg-black',
                        'text-white'));
                    link.classList.add('active', 'bg-black', 'text-white');

                    contentPanels.forEach(panel => panel.classList.add('hidden'));
                    document.getElementById(targetId).classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
