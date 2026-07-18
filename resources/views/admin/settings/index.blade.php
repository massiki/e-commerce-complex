@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Settings</h3>
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
            <div class="text-tiny">Settings</div>
          </li>
        </ul>
      </div>

      @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="wg-box">
        <div class="col-lg-12">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">
              <form name="account_edit_form" action="{{ route('admin.settings.update') }}" method="POST"
                class="form-new-product form-style-1 needs-validation" novalidate="">
                @csrf

                <fieldset class="name">
                  <div class="body-title">Name <span class="tf-color-1">*</span></div>
                  <input class="flex-grow" type="text" placeholder="Full Name" name="name" tabindex="0"
                    value="{{ old('name', $user->name) }}" aria-required="true" required="">
                  @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </fieldset>

                <fieldset class="name">
                  <div class="body-title">Phone <span class="tf-color-1">*</span></div>
                  <input class="flex-grow" type="text" placeholder="Phone Number" name="phone" tabindex="0"
                    value="{{ old('phone', $user->phone) }}" aria-required="true" required="">
                  @error('phone')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </fieldset>

                <fieldset class="name">
                  <div class="body-title">Email Address <span class="tf-color-1">*</span></div>
                  <input class="flex-grow" type="email" placeholder="Email Address" name="email" tabindex="0"
                    value="{{ old('email', $user->email) }}" aria-required="true" required="">
                  @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </fieldset>

                <div class="row">
                  <div class="col-md-12">
                    <div class="my-3">
                      <h5 class="text-uppercase mb-0">Password Change</h5>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <fieldset class="name">
                      <div class="body-title pb-3">Old password</div>
                      <input class="flex-grow" type="password" placeholder="Old password" id="old_password"
                        name="old_password" aria-required="false">
                      @error('old_password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                    </fieldset>
                  </div>

                  <div class="col-md-12">
                    <fieldset class="name">
                      <div class="body-title pb-3">New password</div>
                      <input class="flex-grow" type="password" placeholder="New password" id="new_password"
                        name="new_password" aria-required="false">
                      @error('new_password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                    </fieldset>
                  </div>

                  <div class="col-md-12">
                    <fieldset class="name">
                      <div class="body-title pb-3">Confirm new password</div>
                      <input class="flex-grow" type="password" placeholder="Confirm new password"
                        id="new_password_confirmation" name="new_password_confirmation" aria-required="false">
                    </fieldset>
                  </div>

                  <div class="col-md-12">
                    <div class="my-3">
                      <button type="submit" class="tf-button w208">Save Changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
