<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Tiêu đề trang sẽ được thay đổi động --}}
    <title>@yield('title', 'Tech Shop')</title>

    {{-- Tích hợp CSS/JS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    {{-- Link tới file CSS đã được biên dịch (nếu có) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> body { font-family: "Inter", sans-serif; } </style>
    @stack('styles')
</head>
<body class="text-gray-900 bg-gray-100">

    {{-- 1. Tách Header --}}
    @include('layouts.partials._header')

    {{-- 2. Phần nội dung chính của từng trang sẽ được đưa vào đây --}}
    <main>
        @yield('content')
    </main>

    {{-- 3. Tách Footer --}}
    @include('layouts.partials._footer')

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>