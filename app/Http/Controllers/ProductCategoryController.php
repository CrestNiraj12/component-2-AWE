<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->paginate(10);
        return view("admin.productCategories.productCategories", ['page_title' => 'Product Category', 'categories' => $productCategories]);
    }

    public function show($id)
    {
        $productCategory = ProductCategory::has("products")->with("products")->find($id);
        return view("admin.productCategories.productCategory", ['page_title' => 'Product Category', 'category' => $productCategory]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:png,jpg'
        ]);
        $productCategory = ProductCategory::create($request->all());
        return redirect("/admin/productCategories")->with('success', 'Product Category Added!');
    }

    public function update(Request $request, $id)
    {
        ProductCategory::where('id', $id)->update($request->except(["_token", "_method"]));
        return redirect("/admin/productCategories")->with('success', 'Product Category Updated!');
    }

    public function showAddForm()
    {
        return view('admin.productCategories.add', ['page_title' => 'Add Product Category']);
    }

    public function showEditForm($id)
    {
        $productCategory = $this->show($id);
        return view('admin.productCategories.edit', ['page_title' => 'Edit Product Category', 'productCategory' => $productCategory]);
    }

    public function destroy($id)
    {
        ProductCategory::where('id', $id)->delete();
        return redirect("/admin/productCategories")->with('success', 'Product Category Deleted!');
    }
}
