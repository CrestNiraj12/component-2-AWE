<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHasProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        "cart_id",
        "product_id",
        "quantity",
    ];

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
