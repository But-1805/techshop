<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập - Tech Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-4xl font-extrabold tracking-tighter text-black">TECHSHOP</a>
        </div>
        <div class="bg-white rounded-xl shadow-2xl p-8">
            <h2 class="text-2xl font-bold text-center mb-1">Đăng Nhập</h2>
            <p class="text-center text-gray-500 mb-6">Chào mừng bạn quay trở lại!</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-black text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition-colors">Đăng
                    Nhập</button>
                <div class="text-center mt-6">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline">Quên mật
                            khẩu?</a>
                    @endif
                </div>
                <p class="text-center text-sm text-gray-600 mt-4">Chưa có tài khoản? <a href="{{ route('register') }}"
                        class="font-semibold text-black hover:underline">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
</body>

</html>
