<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

#[Guarded([])]
class Product extends Model
{
    use HasFactory;

    // relasi
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function wishlistItems(): HasMany
    {
        return $this->hasMany(WishlistItem::class);
    }

    // attribute
    public function getHasDiscountAttribute(): bool
    {
        if (! $this->discount) {
            return false;
        }

        return (! $this->discount->start_date || now()->gte($this->discount->start_date))
            &&
            (! $this->discount->end_date || now()->lte($this->discount->end_date));
    }

    public function getDiscountPercentAttribute()
    {
        if (!$this->discount || $this->price <= 0) return 0;
        return 100 - round(($this->discount->value / $this->price) * 100);
    }

    public function getFirstImageAttribute(): string
    {
        $isFirstImage = $this->images->first()?->image;

        return $isFirstImage && Storage::disk('public')->exists($this->images->first()->image)
            ? asset('storage/' . $isFirstImage)
            : asset('image-600x400.png');
    }

    public function getSecondImageAttribute()
    {
        $isSecondImage = $this->images->skip(1)->first()?->image;

        return $isSecondImage && Storage::disk('public')->exists($isSecondImage)
            ? asset('storage/' . $isSecondImage)
            : null;
    }
}
