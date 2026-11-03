<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Offer extends Model
{
    protected $fillable = [
        'name', 'type', 'description', 'image', 'items',
        'regular_price', 'offer_price', 'starts_at', 'ends_at', 'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'regular_price' => 'decimal:2',
        'offer_price' => 'decimal:2',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>', now());
    }

    public function getIsAvailableAttribute(): bool
    {
        return $this->is_active && $this->starts_at <= now() && $this->ends_at > now();
    }
}
