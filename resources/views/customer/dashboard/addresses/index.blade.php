@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Addresses</h2>
      <div class="row">
        <x-customer-sidebar active="addresses" />
        <div class="col-lg-9">
          <div class="page-content my-account__address">
            <div class="row">
              <div class="col-6">
                <p class="notice">The following addresses will be used on the checkout page by default.</p>
              </div>
              <div class="col-6 text-right">
                <a href="{{ route('customer.addresses.create') }}" class="btn btn-sm btn-info">Add New</a>
              </div>
            </div>
            <div class="my-account__address-list row">
              @forelse ($addresses as $address)
                <div class="my-account__address-item col-md-6">
                  <div class="my-account__address-item__title">
                    <h5>{{ $address->recipient_name }}</h5>
                    <div>
                      <a href="{{ route('customer.addresses.edit', $address) }}" class="me-2">Edit</a>
                      <form method="POST" action="{{ route('customer.addresses.destroy', $address) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="menu-link menu-link_us-s p-0 border-0 bg-transparent"
                          onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                      </form>
                    </div>
                  </div>
                  <div class="my-account__address-item__detail">
                    <p>{{ $address->full_address }}</p>
                    <p>{{ $address->district }}, {{ $address->city }}, {{ $address->province }}</p>
                    <p>{{ $address->postal_code }}</p>
                    <br>
                    <p>Mobile: {{ $address->phone }}</p>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-secondary">No addresses found. <a href="{{ route('customer.addresses.create') }}">Add a
                      new address</a></p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
