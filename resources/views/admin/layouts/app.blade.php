<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Dashboard') - TechShop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    {{-- Tải các file CSS và JS đã được Vite biên dịch --}}
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="header-btn" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <div class="logo">
              <div class="logo-icon">A</div>
              <h1 class="logo-text">AdminPanel</h1>
            </div>
        </div>
        <div class="header-right">
            <button class="header-btn" id="themeToggle"><i class="fas fa-moon" id="themeIcon"></i></button>
            <button class="header-btn notification-btn">
              <i class="fas fa-bell"></i>
              <span class="notification-badge"></span>
            </button>
            <div class="user-info">
              <div class="user-avatar"></div>
              <span>{{ Auth::user()->name }}</span>
            </div>
            <a href="{{ route('logout') }}" class="header-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </header>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-nav">
            <div class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-menu="dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
              </a>
            </div>
            {{-- Chúng ta sẽ làm chức năng cho các menu này sau --}}
            <div class="nav-item">
              <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}  " data-menu="products">
                <i class="fas fa-box"></i>
                <span>Products</span>
              </a>
            </div>
            <div class="nav-item">
              <a href="#" class="nav-link" data-menu="orders">
                <i class="fas fa-shopping-cart"></i>
                <span>Orders</span>
              </a>
            </div>
          </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        @yield('content')
    </main>
</body>
</html>