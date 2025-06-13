@extends('admin.layouts.app')
@section('title', 'Quản lý Đơn hàng')
@section('content')
    <div class="page-header">
        <h2 class="page-title">Quản lý Đơn hàng</h2>
    </div>

    <div class="content-card">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">Mã Đơn</th>
                    <th class="p-3">Khách hàng</th>
                    <th class="p-3">Ngày đặt</th>
                    <th class="p-3">Tổng tiền</th>
                    <th class="p-3">Trạng thái</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-mono">#{{ $order->id }}</td>
                        <td class="p-3">{{ $order->customer_name }}</td>
                        <td class="p-3">{{ $order->order_date->format('d/m/Y H:i') }}</td>
                        <td class="p-3 font-semibold">{{ number_format($order->final_total, 0, ',', '.') }}₫</td>
                        <td class="p-3"><span
                                class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                        <td class="p-3 text-right"><a href="{{ route('admin.orders.show', $order) }}"
                                class="btn text-sm">Xem chi tiết</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">Chưa có đơn hàng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $orders->links() }}</div>
    </div>
@endsection
