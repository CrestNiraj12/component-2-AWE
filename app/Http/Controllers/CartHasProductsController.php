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
        $cartHasProducts = CartHasProducts::where(["cart_id" => $cart->id, "product_id" => $request->product_id]);
        if ($cartHasProducts->exists()) 
            $cartHasProducts->update(["quantity" => $cartHasProducts->first()->quantity + $request->quantity]);
        else 
            CartHasProducts::create(["cart_id" => $cart->id, "product_id" => $request->product_id, "quantity" => $request->quantity]);
        
        Alert::success("Successfully added product to the cart!");
        return redirect()->back();
    }

    public function update(Request $request) {
        $request->validate([
            "products.*.0" => "required",
            "products.*.1" => "required|integer|min:1",
        ], [
            "products.*.0.required" => "Product id is required!",
            "products.*.1.required" => "Product quantity is required!",
            "products.*.1.integer" => "Invalid product quantity type!",
            "products.*.1.min" => "Product quantity must not be less than 1!"
        ]);

        $cart = Cart::firstOrCreate(["user_id" => auth()->user()->id]);

        if ($cart) {
            foreach ($request->products as $product) {
                $cartHasProducts = CartHasProducts::where(["cart_id" => $cart->id, "product_id" => $product[0]]);
                if ($cartHasProducts->exists())
                    $cartHasProducts->update(['quantity' => $product[1]]);
                else Alert::error("Product with id " . $product[0] . " not found!");
            }
            Alert::success("Successfully updated cart!");
        } else Alert::error("No products found in cart!");
        
        return redirect()->back();
    }

    public function destroy($id) {
        $cart = Cart::where("user_id", auth()->user()->id)->first();
        if ($cart) {
            CartHasProducts::where(["cart_id" => $cart->id, "product_id" => $id])->delete();
            Alert::success("Successfully deleted product from cart!");
        } else Alert::error("No products found in cart!");
        return redirect()->back();
    }
}
