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

    public function category() {
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }
}
