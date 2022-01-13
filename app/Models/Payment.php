<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "method",
        "amount",
        "status"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, "payment_has_products")->withPivot('quantity');
    }
}
