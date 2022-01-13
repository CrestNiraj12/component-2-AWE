<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBillingDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone",
        "company",
        "address_1",
        "address_2",
        "city",
        "postal_code",
        "country",
        "state",
        "payment_id"
    ];
}
