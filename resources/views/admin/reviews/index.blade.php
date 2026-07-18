@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Reviews</h3>
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
            <div class="text-tiny">All Review</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.reviews.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search by customer or product..." class="" name="search"
                  tabindex="2" value="{{ request('search') }}">
              </fieldset>
              <div class="button-submit">
                <button class="" type="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="wg-table table-all-user">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Customer</th>
                  <th>Rating</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($reviews as $review)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="pname">
                      <div class="name">
                        <a href="#" class="body-title-2">{{ $review->product?->name ?? 'Deleted Product' }}</a>
                      </div>
                    </td>
                    <td>{{ $review->user?->name ?? 'Deleted User' }}</td>
                    <td>
                      <div class="text-nowrap" style="color: #ffa41b; font-size: 16px;">
                        @for ($i = 1; $i <= 5; $i++)
                          @if ($i <= $review->rating)
                            ★
                          @else
                            ☆
                          @endif
                        @endfor
                        <span class="text-tiny text-black ms-2">({{ $review->rating }})</span>
                      </div>
                    </td>
                    <td>{{ $review->created_at->format('d M Y') }}</td>
                    <td>
                      <div class="list-icon-function">
                        <a href="#">
                          <div class="item edit">
                            <i class="icon-edit-3"></i>
                          </div>
                        </a>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">No reviews found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            {{ $reviews->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
