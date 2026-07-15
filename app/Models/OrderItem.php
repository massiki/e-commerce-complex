<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
