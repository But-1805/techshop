@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Sản phẩm')

@section('content')
<div class="page-header">
    <h2 class="page-title">Chỉnh sửa: {{ $product->name }}</h2>
</div>

<div class="content-card">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf
        @method('PUT') {{-- Phương thức PUT để cập nhật --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Tên sản phẩm --}}
            <div>
                <label for="name" class="block font-medium text-gray-700">Tên sản phẩm</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            {{-- Giá --}}
            <div>
                <label for="unit_price" class="block font-medium text-gray-700">Giá (VND)</label>
                <input type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', $product->unit_price) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            {{-- Danh mục --}}
            <div>
                <label for="category_id" class="block font-medium text-gray-700">Danh mục</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nhà cung cấp --}}
            <div>
                <label for="supplier_id" class="block font-medium text-gray-700">Nhà cung cấp</label>
                <select name="supplier_id" id="supplier_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Số lượng tồn kho --}}
            <div>
                <label for="stock_quantity" class="block font-medium text-gray-700">Số lượng tồn kho</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            {{-- Ảnh sản phẩm --}}
            <div>
                <label for="image" class="block font-medium text-gray-700">Ảnh sản phẩm (Để trống nếu không muốn thay đổi)</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="Current image" class="mt-2 h-20 w-20 object-cover">
                @endif
            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">
                <label for="description" class="block font-medium text-gray-700">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>

        {{-- Nút Lưu --}}
        <div class="mt-6">
            <button type="submit" class="btn btn-primary">Cập nhật Sản phẩm</button>
            <a href="{{ route('admin.products.index') }}" class="btn">Hủy</a>
        </div>
    </form>
</div>
@endsection