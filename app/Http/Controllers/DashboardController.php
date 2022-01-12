<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $clients = User::whereHas("roles", function ($q) {
            $q->where("slug", "customer");
        });

        $products = Product::where("user_id", auth()->user()->id)->get();

        return view('admin.dashboard', ["clients" => $clients, "products" => $products]);
    }
}
