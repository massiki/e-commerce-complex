@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Brands</h3>
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
            <div class="text-tiny">Brands</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.brands.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                  value="{{ request('search') }}">
              </fieldset>
              <div class="button-submit">
                <button class="" type="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <a class="tf-button style-1 w208" href="{{ route('admin.brands.create') }}"><i class="icon-plus"></i>Add new</a>
        </div>
        <div class="wg-table table-all-user">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Products</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($brands as $brand)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="pname">
                      <div class="image">
                        <img src="{{ $brand->image ? asset('storage/' . $brand->image) : asset('image-600x400.png') }}"
                          alt="" class="image">
                      </div>
                      <div class="name">
                        <a href="#" class="body-title-2">{{ $brand->name }}</a>
                      </div>
                    </td>
                    <td>{{ $brand->slug }}</td>
                    <td><a href="#" target="_blank">{{ $brand->products_count }}</a></td>
                    <td>
                      <div class="list-icon-function">
                        <a href="{{ route('admin.brands.edit', $brand->id) }}">
                          <div class="item edit">
                            <i class="icon-edit-3"></i>
                          </div>
                        </a>
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
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
                    <td colspan="5" class="text-center">No brands found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

          </div>
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
