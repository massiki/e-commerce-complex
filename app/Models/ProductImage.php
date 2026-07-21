<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Guarded([])]
class ProductImage extends Model
{
    // relasi
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // attribute
    public function getShowImageAttribute()
    {
        return $this->image && Storage::disk('public')->exists($this->image)
            ? asset('storage/'.$this->image)
            : asset('image-600x400.png');
    }
}
