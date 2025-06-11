<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò là 'Admin' hay không
        if (Auth::check() && Auth::user()->role && Auth::user()->role->name == 'Admin') {
            return $next($request);
        }

        // Nếu không phải Admin, chuyển hướng về trang chủ và báo lỗi
        return redirect('/')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
