<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "image",
        "price",
        "units",
        "data",
        "product_category_id",
        "user_id"
    ];

    public function publisher() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }

    public function reviewed_by_users() {
        return $this->belongsToMany(User::class, "user_reviews_products")->withPivot('rating', 'comment', 'created_at');
    }

    public function get_avg_rating() {
        $ratings = UserReviewsProducts::where("product_id", $this->id)->pluck("rating");
        $avg_rating = 0;
        if ($ratings->count() > 0)
            $avg_rating = round($ratings->sum() / $ratings->count());
        return $avg_rating;
    }

    public function get_review_count() {
        $count = UserReviewsProducts::where("product_id", $this->id)->get()->count();
        return $count;
    }

    public function carts() {
        return $this->belongsToMany(Cart::class, "cart_has_products");
    }

    public function payments() {
        return $this->belongsToMany(Payment::class, "payment_has_products");
    }
}
