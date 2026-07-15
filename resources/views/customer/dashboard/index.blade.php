@extends('layouts.app')

@section('content')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="my-account container">
    <h2 class="page-title">My Account</h2>
    <div class="row">
      <div class="col-lg-3">
        <ul class="account-nav">
          <li><a href="{{ route('customer.dashboard') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
          <li><a href="#" class="menu-link menu-link_us-s">Orders</a></li>
          <li><a href="#" class="menu-link menu-link_us-s">Addresses</a></li>
          <li><a href="#" class="menu-link menu-link_us-s">Account Details</a></li>
          <li><a href="#" class="menu-link menu-link_us-s">Wishlist</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="menu-link menu-link_us-s"
                style="background:none;border:none;padding:0;cursor:pointer;color:inherit;font:inherit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      <div class="col-lg-9">
        <div class="page-content my-account__dashboard">
          <p>Hello <strong>{{ Auth::user()->name }}</strong></p>
          <p>From your account dashboard you can view your <a class="unerline-link" href="#">recent
              orders</a>, manage your <a class="unerline-link" href="#">shipping
              addresses</a>, and <a class="unerline-link" href="#">edit your password and account
              details.</a></p>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
