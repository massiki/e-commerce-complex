<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('imageUrl')) {
    function imageUrl(?string $path, string $default = 'image-600x400.png'): string
    {
        if ($path && Storage::exists($path)) {
            return Storage::url($path);
        }

        return asset($default);
    }
}
