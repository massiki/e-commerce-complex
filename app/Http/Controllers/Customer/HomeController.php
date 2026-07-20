<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest('created_at')->get();
        $categories = Category::latest('created_at')->get();
        $hotDealProducts = Product::whereHas('discount', function ($q) {
            $q->where(fn($q) => $q->whereNull('start_date')->orWhere('start_date', '<=', now()))
              ->where(fn($q) => $q->whereNull('end_date')->orWhere('end_date', '>=', now()));
        })->with(['discount', 'images'])->latest()->get();
        $featuredProducts = Product::where('featured', true)->with(['discount', 'images'])->latest('created_at')->get();
        $bannerCategories = Category::inRandomOrder()->take(2)->get();

        return view('customer.home', compact(
            'sliders',
            'categories',
            'hotDealProducts',
            'featuredProducts',
            'bannerCategories'
        ));
    }
}
