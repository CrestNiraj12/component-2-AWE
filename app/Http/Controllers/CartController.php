<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::with("products.category")->firstOrCreate(["user_id" => auth()->user()->id]);
        return view("pages.cart", ["cart" => $cart]);
    }

    public function count() {
        $cart = Cart::with("products")->firstOrCreate(["user_id" => auth()->user()->id]);
        return response()->json($cart->products->count());
    }
}
