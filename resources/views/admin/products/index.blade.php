@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>All Products</h3>
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
            <div class="text-tiny">All Products</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.products.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                  value="{{ request('search') }}">
              </fieldset>
              <div class="button-submit">
                <button class="" type="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <a class="tf-button style-1 w208" href="{{ route('admin.products.create') }}"><i class="icon-plus"></i>Add
            new</a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>SalePrice</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Featured</th>
                <th>Stock</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="pname">
                    <div class="image">
                      <img
                        src="{{ $product->images->first()?->image ? asset('storage/' . $product->images->first()->image) : asset('image-600x400.png') }}"
                        alt="" class="image">
                    </div>
                    <div class="name">
                      <a href="#" class="body-title-2">{{ $product->name }}</a>
                      <div class="text-tiny mt-3">{{ $product->slug }}</div>
                    </div>
                  </td>
                  <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                  <td>
                    @if ($product->discount)
                      Rp{{ number_format($product->discount->value, 0, ',', '.') }}
                    @else
                      -
                    @endif
                  </td>
                  <td>{{ $product->category?->name ?? '-' }}</td>
                  <td>{{ $product->brand?->name ?? '-' }}</td>
                  <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                  <td>
                    @if ($product->stock > 10)
                      <span class="badge bg-success">In Stock</span>
                    @elseif ($product->stock > 0)
                      <span class="badge bg-warning text-dark">Low Stock</span>
                    @else
                      <span class="badge bg-danger">Out of Stock</span>
                    @endif
                  </td>
                  <td>{{ $product->stock }}</td>
                  <td>
                    <div class="list-icon-function">
                      <a href="#" target="_blank">
                        <div class="item eye">
                          <i class="icon-eye"></i>
                        </div>
                      </a>
                      <a href="{{ route('admin.products.edit', $product->id) }}">
                        <div class="item edit">
                          <i class="icon-edit-3"></i>
                        </div>
                      </a>
                      <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                        class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-0 p-0">
                          <div class="item text-danger delete">
                            <i class="icon-trash-2"></i>
                          </div>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="10" class="text-center">No products found</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="divider"></div>
        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    (function($) {
      $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          buttons: ['Cancel', 'Yes, delete it!'],
          dangerMode: true,
        }).then(function(result) {
          if (result) {
            form.submit();
          }
        });
      });
    })(jQuery);
  </script>
@endpush
