<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('pages.profile');
    }
}
