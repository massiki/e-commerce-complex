@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Edit Product</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
          <li>
            <a href="{{ route('admin.dashboard') }}">
              <div class="text-tiny">Dashboard</div>
            </a>
          </li>
          <li>
            <i class="icon-chevron-right"></i>
          </li>
          <li>
            <a href="{{ route('admin.products.index') }}">
              <div class="text-tiny">Products</div>
            </a>
          </li>
          <li>
            <i class="icon-chevron-right"></i>
          </li>
          <li>
            <div class="text-tiny">Edit product</div>
          </li>
        </ul>
      </div>

      <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
        action="{{ route('admin.products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="wg-box">
          <fieldset class="name">
            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0"
              value="{{ old('name', $product->name) }}">
            @error('name')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
          </fieldset>

          <div class="gap22 cols">
            <fieldset class="category">
              <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
              <div class="select">
                <select class="" name="category_id">
                  <option value="">Choose category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                      {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              @error('category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
            <fieldset class="brand">
              <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
              <div class="select">
                <select class="" name="brand_id">
                  <option value="">Choose Brand</option>
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                      {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                      {{ $brand->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              @error('brand_id')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
          </div>

          <fieldset class="description">
            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0">{{ old('description', $product->description) }}</textarea>
            @error('description')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>
        </div>

        <div class="wg-box">
          <fieldset>
            <div class="body-title mb-10">Upload images <span class="tf-color-1">*</span></div>
            <div class="upload-image mb-16" style="display:flex;flex-wrap:wrap;gap:16px;">
              @foreach ($product->images as $image)
                <div class="item" style="position:relative;display:inline-block;" data-id="{{ $image->id }}">
                  <span class="btn-remove-existing"
                    style="position:absolute;top:-8px;right:-8px;width:24px;height:24px;border-radius:50%;background:#dc3545;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:bold;line-height:1;z-index:10;">×</span>
                  <img src="{{ asset('storage/' . $image->image) }}" alt="" class="effect8"
                    style="max-width:150px;max-height:150px">
                </div>
              @endforeach
              <div id="galUpload" class="item up-load">
                <label class="uploadfile" for="gFile">
                  <span class="icon">
                    <i class="icon-upload-cloud"></i>
                  </span>
                  <span class="text-tiny">Drop your images here or select <span class="tf-color">click to
                      browse</span></span>
                  <input type="file" id="gFile" name="images[]" accept="image/*" multiple="">
                </label>
              </div>
            </div>
            @error('images.*')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>

          <div class="cols gap22">
            <fieldset class="name">
              <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
              <input class="mb-10" type="number" step="0.01" placeholder="Enter regular price" name="price"
                tabindex="0" value="{{ (int) old('price', $product->price) }}">
              @error('price')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
            <fieldset class="name">
              <div class="body-title mb-10">Sale Price</div>
              <input class="mb-10" type="number" step="0.01" placeholder="Enter sale price" name="sale_price"
                tabindex="0" value="{{ (int) old('sale_price', $product->discount?->value) }}">
              @error('sale_price')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
          </div>

          <div class="cols gap22">
            <fieldset class="name">
              <div class="body-title mb-10">Discount Start</div>
              <input class="mb-10" type="date" name="discount_start" tabindex="0"
                value="{{ old('discount_start', $product->discount?->start_date?->format('Y-m-d')) }}">
              @error('discount_start')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
            <fieldset class="name">
              <div class="body-title mb-10">Discount End</div>
              <input class="mb-10" type="date" name="discount_end" tabindex="0"
                value="{{ old('discount_end', $product->discount?->end_date?->format('Y-m-d')) }}">
              @error('discount_end')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
          </div>

          <div class="cols gap22">
            <fieldset class="name">
              <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
              <input class="mb-10" type="number" placeholder="Enter quantity" name="stock" tabindex="0"
                value="{{ old('stock', $product->stock) }}">
              @error('stock')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
            <fieldset class="name">
              <div class="body-title mb-10">Featured</div>
              <div class="select mb-10">
                <select class="" name="featured">
                  <option value="0" {{ old('featured', $product->featured) == '0' ? 'selected' : '' }}>No</option>
                  <option value="1" {{ old('featured', $product->featured) == '1' ? 'selected' : '' }}>Yes</option>
                </select>
              </div>
              @error('featured')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </fieldset>
          </div>

          <div class="cols gap10">
            <input type="hidden" name="deleted_images" value="" id="deletedImages">
            <button class="tf-button w-full" type="submit">Update product</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    (function($) {
      var deletedImageIds = [];

      $('.btn-remove-existing').on('click', function() {
        var $item = $(this).closest('.item');
        var id = $item.data('id');
        if (id) {
          deletedImageIds.push(id);
          $('#deletedImages').val(deletedImageIds.join(','));
        }
        $item.remove();
      });

      $('#gFile').on('change', function() {
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
          (function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
              var $el = $(
                '<div class="item" style="position:relative;display:inline-block;">' +
                '<span class="btn-remove" ' +
                'style="position:absolute;top:-8px;right:-8px;width:24px;height:24px;border-radius:50%;background:#dc3545;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:bold;line-height:1;z-index:10;">×</span>' +
                '<img src="' + e.target.result +
                '" alt="" class="effect8" style="max-width:150px;max-height:150px">' +
                '</div>'
              );
              $el.find('.btn-remove').on('click', function() {
                $el.remove();
              });
              $el.insertBefore('#galUpload');
            };
            reader.readAsDataURL(file);
          })(files[i]);
        }
      });
    })(jQuery);
  </script>
@endpush
