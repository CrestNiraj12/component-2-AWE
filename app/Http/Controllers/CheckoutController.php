<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cart::with("products.category")->where(["user_id" => auth()->user()->id]);
        if (!$cart->exists() || $cart->first()->products->count() <= 0) {
            Alert::error("No products available in cart!");
            return redirect("/");
        }
        return view("pages.checkout", ["cart" => $cart->first()]);
    }
}
