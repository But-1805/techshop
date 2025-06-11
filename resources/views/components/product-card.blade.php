{{-- resources/views/components/product-card.blade.php --}}
@props(['product'])

<a href="{{ route('products.show', $product->id) }}" class="block bg-white rounded-lg shadow-sm overflow-hidden group">
    <div class="p-4 bg-gray-100">
        {{-- Sử dụng Storage::url() để lấy đường dẫn đúng sau khi chạy storage:link --}}
        <img src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/400x400/EEEEEE/000000?text=Sản+Phẩm' }}" alt="{{ $product->name }}" class="w-full h-48 object-contain group-hover:scale-105 transition-transform">
    </div>
    <div class="p-4">
        <h3 class="font-semibold h-12">{{ $product->name }}</h3>
        <p class="text-xl font-bold text-red-600 mt-2">{{ number_format($product->unit_price, 0, ',', '.') }}₫</p>
    </div>
</a>