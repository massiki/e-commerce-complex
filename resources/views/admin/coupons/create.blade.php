@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Coupon information</h3>
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
            <a href="{{ route('admin.coupons.index') }}">
              <div class="text-tiny">Coupons</div>
            </a>
          </li>
          <li>
            <i class="icon-chevron-right"></i>
          </li>
          <li>
            <div class="text-tiny">New Coupon</div>
          </li>
        </ul>
      </div>
      <div class="wg-box">
        <form class="form-new-product form-style-1" method="POST" action="{{ route('admin.coupons.store') }}">
          @csrf
          <fieldset class="name">
            <div class="body-title">Coupon Code <span class="tf-color-1">*</span></div>
            <input class="flex-grow" type="text" placeholder="Coupon Code" name="code" tabindex="0"
              value="{{ old('code') }}" aria-required="true" required="">
            @error('code')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>
          <fieldset class="category">
            <div class="body-title">Coupon Type</div>
            <div class="select flex-grow">
              <select class="" name="discount_type">
                <option value="">Select</option>
                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>Percent</option>
              </select>
            </div>
            @error('discount_type')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>
          <fieldset class="name">
            <div class="body-title">Value <span class="tf-color-1">*</span></div>
            <input class="flex-grow" type="text" placeholder="Coupon Value" name="discount_value" tabindex="0"
              value="{{ old('discount_value') }}" aria-required="true" required="">
            @error('discount_value')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>
          <fieldset class="name">
            <div class="body-title">Cart Value <span class="tf-color-1">*</span></div>
            <input class="flex-grow" type="text" placeholder="Cart Value" name="minimum_purchase" tabindex="0"
              value="{{ old('minimum_purchase') }}" aria-required="true" required="">
            @error('minimum_purchase')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>
          <fieldset class="name">
            <div class="body-title">Expiry Date <span class="tf-color-1">*</span></div>
            <input class="flex-grow" type="date" placeholder="Expiry Date" name="expired_at" tabindex="0"
              value="{{ old('expired_at') }}" aria-required="true" required="">
            @error('expired_at')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </fieldset>

          <div class="bot">
            <div></div>
            <button class="tf-button w208" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
