<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use UploadTrait;
    
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->paginate(10);
        return view("admin.productCategories.productCategories", ['page_title' => 'Product Category', 'categories' => $productCategories]);
    }

    public function show($id)
    {
        $productCategory = ProductCategory::with("products")->find($id);
        return $productCategory;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        $imageUrl = $this->imageUpload($request->image);

        $productCategory = ProductCategory::create($request->all());
        $productCategory->image = $imageUrl;
        $productCategory->save();

        return redirect("/admin/products/categories")->with('success', 'Product Category Added!');
    }

    public function update(Request $request, $id)
    {
        $category = tap(ProductCategory::where('id', $id))->update($request->except(["_token", "_method"]))->first();

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image|mimes:jpeg,png,jpg']);
            $imageUrl = $this->imageUpload($request->image);
            $category->image = $imageUrl;
            $category->save();
        }

        return redirect("/admin/products/categories")->with('success', 'Product Category Updated!');
    }

    public function showAddForm()
    {
        return view('admin.productCategories.add', ['page_title' => 'Add Product Category']);
    }

    public function showEditForm($id)
    {
        $productCategory = $this->show($id);
        return view('admin.productCategories.edit', ['page_title' => 'Edit Product Category', 'category' => $productCategory]);
    }

    public function destroy($id)
    {
        ProductCategory::where('id', $id)->delete();
        return redirect("/admin/products/categories")->with('success', 'Product Category Deleted!');
    }
}
