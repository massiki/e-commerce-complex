<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['images', 'discount', 'category', 'brand'])
            ->withAvg('reviews', 'rating');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('brand')) {
            $query->whereHas('brand', fn($q) => $q->whereIn('slug', (array) $request->brand));
        }

        match ($request->sort) {
            'price_asc'  => $query->orderBy('price'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc'   => $query->orderBy('name'),
            'name_desc'  => $query->orderBy('name', 'desc'),
            'oldest'     => $query->orderBy('created_at'),
            'newest'     => $query->orderBy('created_at', 'desc'),
            default      => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();

        return view('customer.product', compact('products', 'categories', 'brands'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'discount', 'category', 'brand', 'reviews.user'])
            ->loadAvg('reviews', 'rating');

        $related = Product::with(['images', 'discount'])
            ->withAvg('reviews', 'rating')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('customer.product-detail', compact('product', 'related'));
    }
}
