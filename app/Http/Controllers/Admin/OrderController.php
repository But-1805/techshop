<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Hiển thị danh sách tất cả đơn hàng.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Hiển thị chi tiết một đơn hàng.
     */
    public function show(Order $order)
    {
        // Eager load các mối quan hệ để tối ưu truy vấn
        $order->load('orderDetails.product', 'user');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Cập nhật trạng thái đơn hàng.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|string']);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order)->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
}
