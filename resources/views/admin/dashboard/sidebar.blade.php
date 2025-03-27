<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('admin/assets/images/logo.svg') }}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset('admin/assets/images/faces/face15.jpg')}}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal text-white">{{Auth::user()->name}}</h5>
              <span>Admin Member</span>
            </div>
          </div>
        </div>
      </li>

      <li class="nav-item menu-items mt-4">
        <a class="nav-link" href="{{ route('brand') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Brands</span>
        </a>
      </li>

      <li class="nav-item menu-items mt-4">
        <a class="nav-link" href="{{ route('category') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Categories</span>
        </a>
      </li>

      <li class="nav-item menu-items mt-4">
        <a class="nav-link" href="{{ route('product') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Products</span>
        </a>
      </li>

      <li class="nav-item menu-items mt-4">
        <a class="nav-link" href="">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Colors</span>
        </a>
      </li>

      <li class="nav-item menu-items mt-4">
        <a class="nav-link" href="">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">sizes</span>
        </a>
      </li>

    </ul>
  </nav>
