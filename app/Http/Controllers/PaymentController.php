<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHasProducts;
use Illuminate\Http\Request;
use Alert;
use App\Models\Cart;
use App\Models\CustomerBillingDetails;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|required",
            "phone" => "required",
            "company" => "nullable",
            "address_1" => "required",
            "address_2" => "required",
            "city" => "required",
            "postal_code" => "required",
            "country" => "required",
            "state" => "required",
        ]);
        
        if ($validator->fails()) {
            Alert::error("Please fill all the required fields before placing an order!");
            return redirect()->back();
        }

        $cart = Cart::where("user_id", auth()->user()->id)->first();

        $payment = Payment::create([
            "user_id" => auth()->user()->id, 
            "method" => "stripe", 
            "amount" => $cart->getTotalAmount(), 
            "status" => "PENDING"]);
        $details = CustomerBillingDetails::create($request->all() + ["payment_id" => $payment->id]);
        
        $products = [];

        foreach ($cart->products as $product) {
            PaymentHasProducts::create([
                "payment_id" => $payment->id, 
                "product_id" => $product->id, 
                "quantity" => $product->pivot->quantity]);
            array_push($products, [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->title,
                        'images' => [$product->image]
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->pivot->quantity,
            ]);
        }

        
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $products,
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/success?session_id={CHECKOUT_SESSION_ID}&payment_id=' . $payment->id,
            'cancel_url' => 'http://127.0.0.1:8000/error?payment_id=' . $payment->id,
        ]);

        return redirect($session->url, 303, ["Location" => $session->url]);
    }

    public function show($id) {
        $payment = Payment::with("products")->find($id);
        return view("admin.payment.payment", ['payment' => $payment]);
    }
}
