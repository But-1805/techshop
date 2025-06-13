@extends('layouts.app')
@section('title', 'Đặt Hàng Thành Công')
@section('content')
<div class="container mx-auto text-center py-20">
    <div class="bg-white p-10 rounded-lg shadow-lg inline-block">
        <svg class="w-16 h-16 mx-auto text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Đặt Hàng Thành Công!</h1>
        <p class="text-lg text-gray-700">Cảm ơn bạn đã mua hàng. Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất.</p>
        <a href="{{ route('home') }}" class="mt-8 inline-block bg-black text-white font-bold py-3 px-8 rounded-lg">Quay về Trang Chủ</a>
    </div>
</div>
@endsection