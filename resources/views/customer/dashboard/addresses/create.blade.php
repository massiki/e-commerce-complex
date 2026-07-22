@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Address</h2>
      <div class="row">
        <x-customer-sidebar active="addresses" />
        <div class="col-lg-9">
          <div class="page-content my-account__address">
            <div class="row">
              <div class="col-6">
                <p class="notice">The following addresses will be used on the checkout page by default.</p>
              </div>
              <div class="col-6 text-right">
                <a href="{{ route('customer.addresses.index') }}" class="btn btn-sm btn-danger">Back</a>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="card mb-5">
                  <div class="card-header">
                    <h5>Add New Address</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('customer.addresses.store') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('recipient_name') is-invalid @enderror"
                              name="recipient_name" id="recipient_name" value="{{ old('recipient_name') }}">
                            <label for="recipient_name">Full Name *</label>
                            @error('recipient_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                              id="phone" value="{{ old('phone') }}">
                            <label for="phone">Phone Number *</label>
                            @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                              name="postal_code" id="postal_code" value="{{ old('postal_code') }}">
                            <label for="postal_code">Pintal Code *</label>
                            @error('postal_code')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                              name="province" id="province" value="{{ old('province') }}">
                            <label for="province">Province *</label>
                            @error('province')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                              id="city" value="{{ old('city') }}">
                            <label for="city">City *</label>
                            @error('city')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control @error('district') is-invalid @enderror"
                              name="district" id="district" value="{{ old('district') }}">
                            <label for="district">District *</label>
                            @error('district')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <textarea class="form-control @error('full_address') is-invalid @enderror" name="full_address" id="full_address"
                              style="min-height:100px">{{ old('full_address') }}</textarea>
                            <label for="full_address">Full Address *</label>
                            @error('full_address')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
