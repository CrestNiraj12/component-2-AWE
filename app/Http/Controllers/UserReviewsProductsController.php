<?php

namespace App\Http\Controllers;

use App\Models\UserReviewsProducts;
use Illuminate\Http\Request;
use Alert;

class UserReviewsProductsController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'rating' => "required|integer|min:0|max:5", 
            'comment' => "required", 
            'product_id' => "required"
        ]);

        UserReviewsProducts::create($request->all() + ["user_id" => auth()->user()->id]);
        Alert::success('Success', 'Thank you for your review!');
        return redirect()->back();
    }
}
