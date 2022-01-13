<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $clients = User::whereHas("roles", function ($q) {
            $q->where("slug", "customer");
        });

        $products = Product::where("user_id", auth()->user()->id)->get();

        $total_sales = Payment::where("status", "SUCCESS");

        $payments = Payment::with("products", "user")->whereHas("products.publisher", function ($q) {
            $q->where("id", auth()->user()->id);
        })->paginate(10);


        return view('admin.dashboard', [
            "clients" => $clients, 
            "products" => $products, 
            "payments" => $payments, 
            "sales" => $total_sales->get()->count(),
            "sales_amount" => $total_sales->pluck("amount")->sum()]);
    }
}
