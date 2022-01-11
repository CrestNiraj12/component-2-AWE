<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::with("category")->orderBy("title")->paginate(9);
        $productCategories = ProductCategory::all();
        return view("pages.products", ["paginator" => $products, "categories" => $productCategories]);
    }

    public function searchProducts(Request $request) {
        $products = Product::with("category")->where("title", "like", "%". $request->search_query ."%");
        if ($request->cat != "All")
            $products = $products->whereHas("category", function ($q) use ($request) {
                $q->where("title", $request->cat);
            });

        if ($request->sort == "RECENT")
            $products->orderBy("updated_at", "desc");
        elseif ($request->sort == "PRICE_ASC")
            $products->orderBy("price");
        elseif ($request->sort == "PRICE_DESC")
            $products->orderBy("price", "desc");
        elseif ($request->sort == "DESC")
            $products->orderBy("title", "desc");
        else $products->orderBy("title");

        $productCategories = ProductCategory::all();
        return view("pages.products", ["paginator" => $products->paginate(9), "categories" => $productCategories, "search_query" => $request->search_query, "sort" => $request->sort]);
    }
}
