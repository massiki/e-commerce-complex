<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    // relasi
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // attribute
    public function getCatImageAttribute()
    {
        return $this->image && Storage::disk('public')->exists($this->image)
            ? asset('storage/'.$this->image)
            : asset('image-600x400.png');
    }
}
