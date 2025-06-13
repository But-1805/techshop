<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Tech Shop')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    {{-- Vite sẽ tự động chèn CSS/JS đã biên dịch vào đây --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-100">

    @include('layouts.partials.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
