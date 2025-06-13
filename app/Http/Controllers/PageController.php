<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(8)->get();
        return view('welcome', compact('products'));
    }

    public function store()
    {
        $products = Product::latest()->paginate(12);
        return view('pages.store', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function profile()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->paginate(5); // hoặc paginate(10)

        return view('pages.profile', compact('user', 'orders'));
    }
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Cập nhật thông tin
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công.');
    }
}
