<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\UserReviewsProducts;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $products = Product::with("category")->orderBy('created_at', 'desc')->paginate(15);
        return view("admin.products.products", ['page_title' => 'Product', 'products' => $products]);
    }

    public function show($id)
    {
        $product = Product::with("category", "reviewed_by_users")->find($id);
        $relatedProducts = Product::whereHas("category", function ($q) use ($product) {
            $q->where("id", $product->category->id);
        })->take(10)->get();
        return view("pages.product", ['page_title' => 'Product', 'product' => $product, 'relatedProducts' => $relatedProducts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
            "description" => 'required',
            "price" => 'required|numeric', 
            "units" => 'required|integer',
            "data" => 'required|integer',
            "product_category_id" => 'required',
        ]);

        $imageUrl = $this->imageUpload($request->image);

        $product = Product::create($request->except('image') + ["user_id" => auth()->user()->id]);
        $product->image = $imageUrl;
        $product->save();
        return redirect("/admin/products")->with('success', 'Product Added!');
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->except(["_token", "_method"]));

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image|mimes:jpeg,png,jpg']);
            $imageUrl = $this->imageUpload($request->image);
            $product->image = $imageUrl;
            $product->save();
        }
        
        return redirect("/admin/products")->with('success', 'Product Updated!');
    }

    public function showAddForm()
    {
        $categories = ProductCategory::all();
        return view('admin.products.add', ['page_title' => 'Add Product', 'categories' => $categories]);
    }

    public function showEditForm(Product $product)
    {
        $product = $product->load("category");
        $categories = ProductCategory::all();
        return view('admin.products.edit', ['page_title' => 'Edit Product', 'product' => $product, 'categories' => $categories]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect("/admin/products")->with('success', 'Product Deleted!');
    }
}
