<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        // 1. Validate dữ liệu form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'ship_address' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 2. Tạo đơn hàng (Order)
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_date' => now(),
                'status' => 'pending',
                'ship_address' => $request->ship_address,
                'final_total' => Cart::total(0, '', ''),
                // Các trường khác có thể để null hoặc có giá trị mặc định
            ]);

            // 3. Tạo chi tiết đơn hàng (Order Details)
            foreach (Cart::content() as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'unit_price' => $item->price,
                ]);
            }

            DB::commit();
            Cart::destroy();

            return redirect()->route('order.success')->with('success', 'Bạn đã đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra, vui lòng thử lại.');
        }
    }
}
