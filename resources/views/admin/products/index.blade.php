@extends('admin.layouts.app')

@section('title', 'Quản lý Sản phẩm')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Danh sách Sản phẩm</h1>
    {{-- Thêm nút "Thêm mới" ở đây --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.products.create') }}"
            class="bg-black text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-800">
            Thêm Sản phẩm mới
        </a>
    </div>
    <table class="w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="border-b">
                <th class="p-3 text-left">Tên sản phẩm</th>
                <th class="p-3 text-left">Giá</th>
                <th class="p-3 text-left">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $product->name }}</td>
                    <td class="p-3">{{ number_format($product->unit_price, 0, ',', '.') }}₫</td>
                    <td class="p-3">
                        {{-- Thêm nút Sửa/Xóa ở đây --}}
                        <a href="#" class="text-blue-600 hover:underline">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
