@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <section class="shop-main container d-flex pt-4 pt-xl-5">
      <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
        <div class="aside-header d-flex d-lg-none align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div>

        <div class="pt-4 pt-lg-0"></div>

        <div class="accordion" id="categories-list">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
                Product Categories
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
              <div class="accordion-body px-0 pb-0 pt-3">
                <ul class="list list-inline mb-0">
                  <li class="list-item">
                    <a href="{{ route('products.index') }}"
                      class="menu-link py-1{{ !request('category') ? ' fw-bold' : '' }}">All</a>
                  </li>
                  @foreach ($categories as $category)
                    <li class="list-item">
                      <a href="{{ route('products.index', array_merge(request()->query(), ['category' => $category->slug])) }}"
                        class="menu-link py-1{{ request('category') == $category->slug ? ' fw-bold' : '' }}">{{ $category->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>





        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Brands
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
              <div class="accordion-body px-0 pb-0 pt-3">
                <ul class="list list-inline mb-0">
                  <li class="list-item">
                    <a href="{{ route('products.index', request()->except('brand')) }}"
                      class="menu-link py-1{{ !request('brand') ? ' fw-bold' : '' }}">All</a>
                  </li>
                  @php $selectedBrands = (array) request('brand', []); @endphp
                  @foreach ($brands as $brand)
                    @php
                      $newBrands = in_array($brand->slug, $selectedBrands)
                          ? array_values(array_diff($selectedBrands, [$brand->slug]))
                          : array_values(array_merge($selectedBrands, [$brand->slug]));
                      $params = array_merge(request()->except('brand'), ['brand' => $newBrands]);
                    @endphp
                    <li class="list-item">
                      <a href="{{ route('products.index', $params) }}"
                        class="menu-link py-1{{ in_array($brand->slug, $selectedBrands) ? ' fw-bold' : '' }}">{{ $brand->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>



      </div>

      <div class="shop-list flex-grow-1">
        <div class="swiper-container js-swiper-slider slideshow slideshow_small slideshow_split"
          data-settings='{
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": 1,
          "effect": "fade",
          "loop": true,
          "pagination": {
            "el": ".slideshow-pagination",
            "type": "bullets",
            "clickable": true
          }
        }'>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                <div class="slide-split_text position-relative d-flex align-items-center"
                  style="background-color: #f5e6e0;">
                  <div class="slideshow-text container p-3 p-xl-5">
                    <h2
                      class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                      Women's <br /><strong>ACCESSORIES</strong></h2>
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
                  </div>
                </div>
                <div class="slide-split_media position-relative">
                  <div class="slideshow-bg" style="background-color: #f5e6e0;">
                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                      alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                <div class="slide-split_text position-relative d-flex align-items-center"
                  style="background-color: #f5e6e0;">
                  <div class="slideshow-text container p-3 p-xl-5">
                    <h2
                      class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                      Women's <br /><strong>ACCESSORIES</strong></h2>
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
                  </div>
                </div>
                <div class="slide-split_media position-relative">
                  <div class="slideshow-bg" style="background-color: #f5e6e0;">
                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                      alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                <div class="slide-split_text position-relative d-flex align-items-center"
                  style="background-color: #f5e6e0;">
                  <div class="slideshow-text container p-3 p-xl-5">
                    <h2
                      class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                      Women's <br /><strong>ACCESSORIES</strong></h2>
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
                  </div>
                </div>
                <div class="slide-split_media position-relative">
                  <div class="slideshow-bg" style="background-color: #f5e6e0;">
                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                      alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container p-3 p-xl-5">
            <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2"></div>

          </div>
        </div>

        <div class="mb-3 pb-2 pb-xl-3"></div>

        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
          </div>

          <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
            <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items"
              onchange="window.location.href = this.value">
              <option value="{{ route('products.index', request()->except('sort')) }}" @selected(!request('sort'))>
                Default Sorting</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'newest'])) }}"
                @selected(request('sort') == 'newest')>Newest</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'oldest'])) }}"
                @selected(request('sort') == 'oldest')>Oldest</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'name_asc'])) }}"
                @selected(request('sort') == 'name_asc')>Alphabetically, A-Z</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'name_desc'])) }}"
                @selected(request('sort') == 'name_desc')>Alphabetically, Z-A</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_asc'])) }}"
                @selected(request('sort') == 'price_asc')>Price, low to high</option>
              <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_desc'])) }}"
                @selected(request('sort') == 'price_desc')>Price, high to low</option>
            </select>

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            <div class="col-size align-items-center order-1 d-none d-lg-flex">
              <span class="text-uppercase fw-medium me-2">View</span>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                data-cols="2">2</button>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                data-cols="3">3</button>
              <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
            </div>

            <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
              <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_filter" />
                </svg>
                <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
              </button>
            </div>
          </div>
        </div>

        <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
          @forelse($products as $product)
            @php
              $discountVal = $product->discount?->value;
              $salePrice = $discountVal ?? null;
              $hasDiscount =
                  $product->discount &&
                  (!$product->discount->start_date || now() >= $product->discount->start_date) &&
                  (!$product->discount->end_date || now() <= $product->discount->end_date);
            @endphp
            <div class="product-card-wrapper">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <div class="swiper-container background-img js-swiper-slider"
                    data-settings='{"resizeObserver": true}'>
                    <div class="swiper-wrapper">
                      @forelse($product->images as $image)
                        <div class="swiper-slide">
                          <a href="{{ route('products.show', $product->slug) }}">
                            <img loading="lazy"
                              src="{{ \Illuminate\Support\Facades\Storage::disk('public')->exists($image->image) ? asset('storage/' . $image->image) : asset('image-600x400.png') }}"
                              width="330" height="400" alt="{{ $product->name }}" class="pc__img">
                          </a>
                        </div>
                      @empty
                        <div class="swiper-slide">
                          <a href="{{ route('products.show', $product->slug) }}">
                            <img loading="lazy" src="{{ asset('image-600x400.png') }}" width="330" height="400"
                              alt="{{ $product->name }}" class="pc__img">
                          </a>
                        </div>
                      @endforelse
                    </div>
                    @if ($product->images->count() > 1)
                      <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                          xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_prev_sm" />
                        </svg></span>
                      <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                          xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_next_sm" />
                        </svg></span>
                    @endif
                  </div>
                  @if ($product->stock == 0)
                    <div class="position-absolute top-50 start-50 translate-middle bg-dark text-white px-3 py-2 rounded"
                      style="z-index: 2;">
                      Out of Stock
                    </div>
                  @endif
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">{{ $product->category?->name }}</p>
                  <h6 class="pc__title"><a
                      href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h6>
                  <div class="product-card__price d-flex{{ $salePrice ? ' align-items-center' : '' }}">
                    @if ($hasDiscount)
                      <span class="money price price-old">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                      <span
                        class="money price{{ $salePrice ? ' price-sale' : '' }}">Rp{{ number_format($salePrice ?? $product->price, 0, ',', '.') }}</span>
                    @else
                      <span class="money price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                    @endif
                  </div>
                  <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                      @for ($i = 1; $i <= 5; $i++)
                        <svg
                          class="review-star{{ $i <= round($product->reviews_avg_rating ?? 0) ? ' review-star_active' : '' }}"
                          viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_star" />
                        </svg>
                      @endfor
                    </div>
                    <span
                      class="reviews-note text-lowercase text-secondary ms-1">({{ number_format($product->reviews_avg_rating ?? 0, 1) }})</span>
                  </div>
                </div>

                @if ($salePrice && $hasDiscount)
                  <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                    <div class="pc-labels__right ms-auto">
                      <span
                        class="pc-label pc-label_sale d-block text-white">{{ 100 - round(($discountVal / $product->price) * 100) }}%</span>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <p class="text-secondary">No products found</p>
            </div>
          @endforelse
        </div>

        <x-pagination-custom :paginator="$products" />
      </div>
    </section>
  </main>
@endsection
