<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest('created_at')->get();
        $categories = Category::latest('created_at')->get();

        $hotDealProducts = Product::whereHas('discount', function ($query) {
            $query->where(fn ($q) => $q->whereNull('start_date')->orWhere('start_date', '<=', now()))
                ->where(fn ($q) => $q->whereNull('end_date')->orWhere('end_date', '>=', now()));
        })->with(['discount', 'images'])->latest()->get();

        $featuredProducts = Product::where('featured', true)->with([
            'discount',
            'images',
        ])->latest('created_at')->get();
        // dd($featuredProducts);

        $bannerCategories = Category::inRandomOrder()->take(2)->get();

        $cartItems = collect();
        if (Auth::check()) {
            Auth::user()->load('cart.items');
            $cartItems = Auth::user()->cart?->items->keyBy('product_id') ?? collect();
        }

        return view('customer.home', compact(
            'sliders',
            'categories',
            'hotDealProducts',
            'featuredProducts',
            'bannerCategories',
            'cartItems'
        ));
    }
}
