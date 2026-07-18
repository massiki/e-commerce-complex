@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Customers</h3>
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
            <div class="text-tiny">All Customer</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.customers.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                  value="{{ request('search') }}">
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
                  <th>User</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th class="text-center">Total Orders</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($customers as $customer)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="pname">
                      <div class="image">
                        <img src="{{ asset('admin/images/avatar/user-1.png') }}" alt="" class="image">
                      </div>
                      <div class="name">
                        <a href="#" class="body-title-2">{{ $customer->name }}</a>
                        <div class="text-tiny mt-3">{{ $customer->role?->name ?? 'N/A' }}</div>
                      </div>
                    </td>
                    <td>{{ $customer->phone ?? '-' }}</td>
                    <td>{{ $customer->email }}</td>
                    <td class="text-center">
                      <a href="#" target="_blank">{{ $customer->orders_count }}</a>
                    </td>
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
                    <td colspan="6" class="text-center">No customers found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            {{ $customers->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
