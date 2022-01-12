<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHasProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        "payment_id",
        "product_id",
        "quantity"
    ];

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
