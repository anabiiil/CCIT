<?php

namespace App\Models\Cashier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'stripe_id',
        'subscription_id',
        'stripe_product',
        'stripe_price',
        'quantity',
    ];
}
