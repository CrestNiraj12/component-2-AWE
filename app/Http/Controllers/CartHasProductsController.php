<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Cart;
use App\Models\CartHasProducts;

class CartHasProductsController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            "product_id" => "required",
            "quantity" => "required|integer|min:1"
        ]);

        $cart = Cart::firstOrCreate(["user_id" => auth()->user()->id]);
        CartHasProducts::CreateOrUpdate(["cart_id" => $cart->id, "product_id" => $request->product_id], ["quantity" => $request->quantity]);
        
        Alert::success("Successfully added product to the cart!");
        return redirect()->back();
    }

    public function update(Request $request) {
        // $request->validate([
        //     "products" => "required"
        // ]);

        // $cart = Cart::firstOrCreate(["user_id" => auth()->user()->id]);
        // Alert::success("Successfully updated cart!");
        // return redirect()->back();
    }

    public function delete($id) {
        $cart = Cart::where("user_id", auth()->user()->id)->first();
        CartHasProducts::where(["cart_id" => $cart->id, "product_id" => $id])->delete();
        Alert::success("Successfully deleted product from cart!");
        return redirect()->back();
    }
}
