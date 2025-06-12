@extends('admin.layouts.app')

@section('title', 'Quản lý Sản phẩm')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Quản lý Sản phẩm</h2>
        <div class="page-actions">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Thêm Sản phẩm
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-card">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Ảnh</th>
                    <th class="p-3">Tên sản phẩm</th>
                    <th class="p-3">Giá</th>
                    <th class="p-3">Số lượng</th>
                    <th class="p-3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3"><img
                                src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/80x80' }}"
                                alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded"></td>
                        <td class="p-3">{{ $product->name }}</td>
                        <td class="p-3">{{ number_format($product->unit_price, 0, ',', '.') }}₫</td>
                        <td class="p-3">{{ $product->stock_quantity }}</td>
                        <td class="p-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="action-btn" title="Sửa"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn" title="Xóa"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center">Không có sản phẩm nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
