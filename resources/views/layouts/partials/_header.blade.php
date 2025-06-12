<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="text-3xl font-extrabold tracking-tighter">TECHSHOP</a>

            {{-- ... Thanh tìm kiếm ... --}}

            <div class="flex items-center space-x-6">
                <a href="{{ route('cart') }}" class="flex items-center space-x-2 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="hidden lg:inline">Giỏ hàng</span>
                </a>

                @guest
                    <a href="{{ route('login') }}" class="flex items-center space-x-2 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="hidden lg:inline">Tài khoản</span>
                    </a>
                @else
                    {{-- Dropdown cho User --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="hidden lg:inline font-semibold hover:text-gray-600">{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20"
                            style="display: none;">
                            @if (Auth::user()->role && Auth::user()->role->name == 'Admin')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Trang Admin</a>
                            @endif
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hồ sơ</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <nav class="bg-black text-white">
        <div class="container mx-auto px-4">
            <ul class="flex items-center justify-center space-x-10 font-semibold py-3">
                @foreach ($categories as $category)
                    <li><a href="#" class="hover:text-gray-300">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
