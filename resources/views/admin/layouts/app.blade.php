<!DOCTYPE html>
<html lang="vi">
<head>
    {{-- ... Thẻ meta, title, link CSS ... --}}
    <title>Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
            <h1 class="text-2xl font-bold mb-4">TechShop Admin</h1>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Sản phẩm</a>
                {{-- Thêm các link khác ở đây --}}
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="w-full p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>