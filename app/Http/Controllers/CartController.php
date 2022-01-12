<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::with("products")->firstOrCreate(["user_id" => auth()->user()->id]);
        return view("admin.cart.cart", ["cart" => $cart]);
    }
}
