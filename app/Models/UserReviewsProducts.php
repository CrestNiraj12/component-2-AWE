<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReviewsProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating', 'comment', 'user_id', 'product_id'
    ];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function product() {
        $this->belongsTo(Product::class);
    }
}
