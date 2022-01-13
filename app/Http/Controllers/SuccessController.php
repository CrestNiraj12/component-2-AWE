<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartHasProducts;
use App\Models\Payment;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index(Request $request) {
        Payment::where("id", $request->payment_id)->update(["status" => "SUCCESS"]);

        $cart = Cart::where("user_id", auth()->user()->id)->first();
        CartHasProducts::where("cart_id", $cart->id)->delete();

        return view("pages.success");
    }
}
