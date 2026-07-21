<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $keyword = $request->input('q');

        $products = Product::with('images')
            ->where('name', 'like', "%{$keyword}%")
            ->limit(8)
            ->get()
            ->map(fn ($product) => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price_formatted' => 'Rp '.number_format($product->price, 0, ',', '.'),
                'first_image' => $product->first_image,
                'url' => route('products.show', $product->slug),
            ]);

        return response()->json(['products' => $products]);
    }
}
