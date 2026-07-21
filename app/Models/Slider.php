<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = [
        'title_small',
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'image',
    ];

    // attribute
    public function getSliderImageAttribute()
    {
        return $this->image && Storage::disk('public')->exists($this->image)
            ? asset('storage/'.$this->image)
            : asset('image-600x400.png');
    }
}
