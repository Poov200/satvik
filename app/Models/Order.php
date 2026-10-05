<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'order_number',

        'customer_name',

        'phone',

        'address',

        'items',

        'total_amount',

        'payment_method',

        'payment_status',

        'upi_transaction_id',

        'order_status',

    ];

    protected $casts = [

        'items' => 'array',

        'total_amount' => 'decimal:2',

    ];
}