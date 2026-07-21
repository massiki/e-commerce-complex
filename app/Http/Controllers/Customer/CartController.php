<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItems = $cart->items()->with(['product.images', 'product.discount'])->get();

        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product?->has_discount ? $item->product->discount->value : $item->product?->price;
            return $price * $item->quantity;
        });

        $vat = 0;
        $total = $subtotal;

        return view('customer.carts', compact('cartItems', 'subtotal', 'vat', 'total'));
    }

    public function store(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cart->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['quantity' => 0],
        )->increment('quantity', $request->integer('quantity', 1));

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->firstOrFail();

        foreach ($request->input('quantities', []) as $itemId => $quantity) {
            $item = $cart->items()->find($itemId);
            if ($item) {
                $item->update(['quantity' => max(1, (int) $quantity)]);
            }
        }

        return back()->with('success', 'Cart updated!');
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if($cartItem->cart->user_id !== Auth::id(), 403);
        $cartItem->delete();
        return back()->with('success', 'Item removed from cart!');
    }
}
