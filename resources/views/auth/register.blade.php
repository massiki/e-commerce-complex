@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                    href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Register</a>
            </li>
        </ul>
        <div class="tab-content pt-2">
            <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel">
                <div class="register-form">
                    <form method="POST" action="{{ route('register') }}" name="register-form" class="needs-validation" novalidate="">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="name" type="text"
                                class="form-control form-control_gray @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Name *</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email"
                                class="form-control form-control_gray @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">Email address *</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="phone" type="text"
                                class="form-control form-control_gray @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" autocomplete="tel">
                            <label for="phone">Phone</label>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password"
                                class="form-control form-control_gray @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            <label for="password">Password *</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password"
                                class="form-control form-control_gray @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm">Confirm Password *</label>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center mb-3 pb-2">
                            <p class="m-0">Your personal data will be used to support your experience throughout this
                                website, to manage access to your account, and for other purposes described in our
                                privacy policy.</p>
                        </div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">Have an account?</span>
                            <a href="{{ route('login') }}" class="btn-text js-show-register">Login to your Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
