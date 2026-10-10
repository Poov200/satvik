<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'weight',
        'price',
        'rating',
        'badge',
        'description',
        'image',
        'variants',
        'status',
    ];

    protected $casts = [
        'variants' => 'array',
        'price' => 'decimal:2',
        'rating' => 'decimal:2',
        'status' => 'boolean',
    ];
}