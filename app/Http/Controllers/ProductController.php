<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with("category")->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.products.products", ['page_title' => 'Product', 'products' => $products]);
    }

    public function show($id)
    {
        $product = Product::with("category")->find($id);
        $relatedProducts = Product::whereHas("category", function ($q) use ($product) {
            $q->where("id", $product->category->id);
        })->take(10)->get();
        return view("pages.product", ['page_title' => 'Product', 'product' => $product, 'relatedProducts' => $relatedProducts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:png,jpg',
            "description" => 'required',
            "price" => 'required|numeric', 
            "units" => 'required|integer',
            "data" => 'required|integer',
            "product_category_id" => 'required',
        ]);
        $product = Product::create($request->all());
        return redirect("/admin/products")->with('success', 'Product Added!');
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update($request->except(["_token", "_method"]));
        return redirect("/admin/products")->with('success', 'Product Updated!');
    }

    public function showAddForm()
    {
        $categories = ProductCategory::all();
        return view('admin.products.add', ['page_title' => 'Add Product', 'categories' => $categories]);
    }

    public function showEditForm($id)
    {
        $product = $this->show($id);
        $categories = ProductCategory::all();
        return view('admin.products.edit', ['page_title' => 'Edit Product', 'product' => $product, 'categories' => $categories]);
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect("/admin/products")->with('success', 'Product Deleted!');
    }
}
