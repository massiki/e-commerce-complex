@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>

      @if ($wishlistItems->isEmpty())
        <div class="text-center py-5">
          <h3>Your wishlist is empty</h3>
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-checkout mt-3">SHOP NOW</a>
        </div>
      @else
        <div class="shopping-cart">
          <div class="cart-table__wrapper">
            <table class="cart-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th></th>
                  <th>Price</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($wishlistItems as $item)
                  @php
                    $product = $item->product;
                    $price = $product?->price ?? 0;
                  @endphp
                  <tr>
                    <td>
                      <div class="shopping-cart__product-item">
                        <img loading="lazy" src="{{ $product?->first_image }}" width="120" height="120"
                          alt="{{ $product?->name ?? 'Product' }}" />
                      </div>
                    </td>
                    <td>
                      <div class="shopping-cart__product-item__detail">
                        <h4>{{ $product?->name ?? 'Unknown Product' }}</h4>
                        @if ($product?->short_description)
                          <p class="shopping-cart__product-item__description mt-2 text-secondary">
                            {{ Str::limit($product->short_description, 60) }}
                          </p>
                        @endif
                      </div>
                    </td>
                    <td>
                      @if ($product?->has_discount)
                        <span
                          class="shopping-cart__product-price price-old">Rp{{ number_format($price, 0, ',', '.') }}</span>
                        <span
                          class="shopping-cart__product-price">Rp{{ number_format($product->discount->value, 0, ',', '.') }}
                        </span>
                      @else
                        <span class="shopping-cart__product-price">Rp{{ number_format($price, 0, ',', '.') }}</span>
                      @endif
                    </td>
                    <td>
                      @if ($product?->has_discount)
                        <span
                          class="shopping-cart__subtotal">Rp{{ number_format($product->discount->value, 0, ',', '.') }}</span>
                      @else
                        <span class="shopping-cart__subtotal">Rp{{ number_format($price, 0, ',', '.') }}</span>
                      @endif
                    </td>
                    <td>
                      <a href="#" class="remove-cart"
                        onclick="event.preventDefault(); if (confirm('Remove this item from wishlist?')) document.getElementById('remove-wishlist-form-{{ $item->id }}').submit();">
                        <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="color: #dc2626">
                          <use href="#icon_heart_filled" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          @foreach ($wishlistItems as $item)
            <form action="{{ route('customer.wishlist.remove', $item) }}" method="POST"
              id="remove-wishlist-form-{{ $item->id }}" class="d-none">
              @csrf
              @method('DELETE')
            </form>
          @endforeach
        </div>
      @endif
    </section>
  </main>
@endsection
