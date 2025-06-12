@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
   <!-- Dashboard Content -->
    <div id="dashboard-content">
        <div class="page-header">
          <h2 class="page-title">Dashboard Overview</h2>
          <div class="page-actions">
            <button class="btn">
              <i class="fas fa-calendar"></i>
              Last 30 days
            </button>
          </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-info">
                <h3>Total Sales</h3>
                <div class="value">$45,230</div>
                <div class="stat-change">
                  <i class="fas fa-trending-up"></i>
                  +12%
                </div>
              </div>
              <div class="stat-icon green">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-info">
                <h3>Total Orders</h3>
                <div class="value">1,234</div>
                <div class="stat-change">
                  <i class="fas fa-trending-up"></i>
                  +8%
                </div>
              </div>
              <div class="stat-icon blue">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-info">
                <h3>Total Users</h3>
                <div class="value">5,678</div>
                <div class="stat-change">
                  <i class="fas fa-trending-up"></i>
                  +15%
                </div>
              </div>
              <div class="stat-icon purple">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-info">
                <h3>Total Products</h3>
                <div class="value">890</div>
                <div class="stat-change">
                  <i class="fas fa-trending-up"></i>
                  +3%
                </div>
              </div>
              <div class="stat-icon orange">
                <i class="fas fa-box"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
          <!-- Recent Orders -->
          <div class="content-card">
            <div class="card-header">
              <h3 class="card-title">Recent Orders</h3>
              <a href="#" class="view-all">View All</a>
            </div>
            {{-- ... Nội dung danh sách đơn hàng ... --}}
          </div>

          <!-- Top Products -->
          <div class="content-card">
            <div class="card-header">
              <h3 class="card-title">Top Products</h3>
              <a href="#" class="view-all">View All</a>
            </div>
            {{-- ... Nội dung danh sách sản phẩm bán chạy ... --}}
          </div>
        </div>
    </div>
@endsection
