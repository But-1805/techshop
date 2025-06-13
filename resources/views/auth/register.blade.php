<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Ký - Tech Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen py-8">
    <div class="w-full max-w-md p-4">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-4xl font-extrabold tracking-tighter text-black">TECHSHOP</a>
        </div>
        <div class="bg-white rounded-xl shadow-2xl p-8">
            <h2 class="text-2xl font-bold text-center mb-1">Tạo Tài Khoản</h2>
            <p class="text-center text-gray-500 mb-6">Bắt đầu hành trình của bạn với Techshop!</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        autocomplete="email">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận Mật
                        khẩu</label>
                    <input id="password-confirm" type="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit"
                    class="w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">Đăng
                    Ký</button>
                <p class="text-center text-sm text-gray-600 mt-4">Đã có tài khoản? <a href="{{ route('login') }}"
                        class="font-semibold text-black hover:underline">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)"
                    },
                }).showToast();
            });
        </script>
    @endif
</body>

</html>
