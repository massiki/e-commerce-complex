<div class="section-menu-left">
  <div class="box-logo">
    <a href="#" id="site-logo-inner">
      <img class="" id="logo_header" alt="" src="{{ asset('admin/images/logo/logo.png') }}"
        data-light="{{ asset('admin/images/logo/logo.png') }}" data-dark="{{ asset('admin/images/logo/logo.png') }}">
    </a>
    <div class="button-show-hide">
      <i class="icon-menu-left"></i>
    </div>
  </div>
  <div class="center">
    <div class="center-item">
      <div class="center-heading">Main Home</div>
      <ul class="menu-list">
        <li class="menu-item">
          <a href="{{ route('admin.dashboard') }}" class="">
            <div class="icon"><i class="icon-grid"></i></div>
            <div class="text">Dashboard</div>
          </a>
        </li>
      </ul>
    </div>
    <div class="center-item">
      <ul class="menu-list">
        <li class="menu-item has-children">
          <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-shopping-cart"></i></div>
            <div class="text">Products</div>
          </a>
          <ul class="sub-menu">
            <li class="sub-menu-item">
              <a href="{{ asset('admin/add-product.html') }}" class="">
                <div class="text">Add Product</div>
              </a>
            </li>
            <li class="sub-menu-item">
              <a href="{{ asset('admin/products.html') }}" class="">
                <div class="text">Products</div>
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-item @if (request()->routeIs('admin.brands.*')) active @endif">
          <a href="{{ route('admin.brands.index') }}" class="">
            <div class="icon"><i class="icon-layers"></i></div>
            <div class="text">Brand</div>
          </a>
        </li>
        <li class="menu-item has-children">
          <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-layers"></i></div>
            <div class="text">Category</div>
          </a>
          <ul class="sub-menu">
            <li class="sub-menu-item">
              <a href="{{ asset('admin/add-category.html') }}" class="">
                <div class="text">New Category</div>
              </a>
            </li>
            <li class="sub-menu-item">
              <a href="{{ asset('admin/categories.html') }}" class="">
                <div class="text">Categories</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="menu-item has-children">
          <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-file-plus"></i></div>
            <div class="text">Order</div>
          </a>
          <ul class="sub-menu">
            <li class="sub-menu-item">
              <a href="{{ asset('admin/orders.html') }}" class="">
                <div class="text">Orders</div>
              </a>
            </li>
            <li class="sub-menu-item">
              <a href="{{ asset('admin/order-tracking.html') }}" class="">
                <div class="text">Order tracking</div>
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-item">
          <a href="{{ asset('admin/slider.html') }}" class="">
            <div class="icon"><i class="icon-image"></i></div>
            <div class="text">Slider</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ asset('admin/coupons.html') }}" class="">
            <div class="icon"><i class="icon-grid"></i></div>
            <div class="text">Coupns</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="{{ asset('admin/users.html') }}" class="">
            <div class="icon"><i class="icon-user"></i></div>
            <div class="text">User</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="{{ asset('admin/settings.html') }}" class="">
            <div class="icon"><i class="icon-settings"></i></div>
            <div class="text">Settings</div>
          </a>
        </li>

        <li class="menu-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
              class="flex items-center justify-start gap-2 w-full px-4 py-3 bg-transparent border-0 cursor-pointer">
              <div class="icon"><i class="icon-log-out"></i></div>
              <div class="text">Log Out</div>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>
