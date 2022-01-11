<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::with("category")->paginate(9);
        $productCategories = ProductCategory::all();
        return view("pages.products", ["paginator" => $products, "categories" => $productCategories]);
    }

    public function searchProducts(Request $request) {
        $products = Product::with("category")->where("title", "like", "%". $request->search_query ."%");
        if ($request->cat != "All")
            $products = $products->whereHas("category", function ($q) use ($request) {
                $q->where("title", $request->cat);
            });
        $productCategories = ProductCategory::all();
        return view("pages.products", ["paginator" => $products->paginate(9), "categories" => $productCategories, "search_query" => $request->search_query]);
    }
}
