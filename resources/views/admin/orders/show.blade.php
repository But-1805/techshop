@extends('admin.layouts.app')
@section('title', 'Chi tiết Đơn hàng #' . $order->id)
@section('content')
    <div class="page-header">
        <h2 class="page-title">Chi tiết Đơn hàng: <span class="font-mono">#{{ $order->id }}</span></h2>
        <div class="page-actions"><a href="{{ route('admin.orders.index') }}" class="btn">Quay lại danh sách</a></div>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">{{ session('success') }}</div>
    @endif

    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <div class="content-card">
                <h3 class="card-title">Các sản phẩm trong đơn hàng</h3>
                <table class="w-full text-left mt-4">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">Sản phẩm</th>
                            <th class="p-2">Số lượng</th>
                            <th class="p-2">Đơn giá</th>
                            <th class="p-2 text-right">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            <tr class="border-b">
                                <td class="p-2">{{ $detail->product->name }}</td>
                                <td class="p-2">{{ $detail->quantity }}</td>
                                <td class="p-2">{{ number_format($detail->unit_price, 0, ',', '.') }}₫</td>
                                <td class="p-2 text-right">
                                    {{ number_format($detail->unit_price * $detail->quantity, 0, ',', '.') }}₫</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-bold">
                            <td colspan="3" class="p-2 text-right">Tổng cộng:</td>
                            <td class="p-2 text-right">{{ number_format($order->final_total, 0, ',', '.') }}₫</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="md:col-span-1">
            <div class="content-card space-y-4">
                <h3 class="card-title">Thông tin Khách hàng</h3>
                <p><strong>Tên:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Điện thoại:</strong> {{ $order->customer_phone }}</p>
                <p><strong>Địa chỉ giao hàng:</strong> {{ $order->ship_address }}</p>
            </div>
            <div class="content-card mt-8">
                <h3 class="card-title">Cập nhật Trạng thái</h3>
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="mt-4">
                    @csrf
                    <select name="status" class="w-full border p-2 rounded-md">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang xử lý (Pending)
                        </option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang giao
                            (Processing)</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Đã giao (Completed)
                        </option>
                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã hủy (Canceled)
                        </option>
                    </select>
                    <button type="submit" class="btn btn-primary w-full mt-2">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
