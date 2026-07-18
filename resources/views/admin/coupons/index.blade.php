@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Coupons</h3>
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
            <div class="text-tiny">Coupons</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.coupons.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                  value="{{ request('search') }}">
              </fieldset>
              <div class="button-submit">
                <button class="" type="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <a class="tf-button style-1 w208" href="{{ route('admin.coupons.create') }}"><i class="icon-plus"></i>Add
            new</a>
        </div>
        <div class="wg-table table-all-user">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Code</th>
                  <th>Type</th>
                  <th>Value</th>
                  <th>Cart Value</th>
                  <th>Expiry Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($coupons as $coupon)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount_type }}</td>
                    <td>{{ number_format($coupon->discount_value, 0, ',', '.') }}{{ $coupon->discount_type === 'percent' ? '%' : '' }}</td>
                    <td>{{ number_format($coupon->minimum_purchase, 0, ',', '.') }}</td>
                    <td>
                      @if ($coupon->expired_at)
                        @if ($coupon->expired_at->isPast())
                          <span class="badge bg-danger">{{ $coupon->expired_at->diffForHumans() }}</span>
                        @else
                          <span class="badge bg-success">{{ $coupon->expired_at->diffForHumans() }}</span>
                        @endif
                      @else
                        -
                      @endif
                    </td>
                    <td>
                      <div class="list-icon-function">
                        <a href="{{ route('admin.coupons.edit', $coupon->id) }}">
                          <div class="item edit">
                            <i class="icon-edit-3"></i>
                          </div>
                        </a>
                        <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST"
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
                    <td colspan="7" class="text-center">No coupons found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="divider"></div>
        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
          {{ $coupons->links('pagination::bootstrap-5') }}
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
