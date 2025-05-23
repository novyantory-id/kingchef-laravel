<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }} - King Chef</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/img-icon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">

  {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }} " rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/alert.css') }}">

  {{-- Sweetalert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- Editor --}}
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

  {{-- Tambahkan di head --}}
  

{{-- Setelah hapus berhasil --}}

  <style>
    .ql-media i {
    font-size: 16px;
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
        <img src="{{ asset('assets/img/kingchef.png') }}" alt="" width="70">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        {{-- <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon--> --}}

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (auth()->user()->avatar)
            <img src="{{ asset('storage/profile/'.auth()->user()->avatar) }}" alt="Profile" class="rounded-circle">
            @else
            <img src="{{ asset('assets/img/frontend/default.png') }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->fullname }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->fullname }}</h6>
              <span>{{ auth()->user()->role }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.settings') }}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bx bx-home"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-detail"></i><span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.posts.add') }}">
              <i class="bi bi-circle"></i><span>Add Post</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.posts.all') }}">
              <i class="bi bi-circle"></i><span>All Posts</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.posts') }}">
              <i class="bi bi-circle"></i><span>My Post</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.editor') }}">
              <i class="bi bi-circle"></i><span>Editor Pick</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.media.index') }}">
          <i class="bx bx-images"></i>
          <span>Media</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bx bx-comment-detail"></i>
          <span>Comments</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.settings') }}">
          <i class="bx bx-comment-detail"></i>
          <span>Settings</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-heading">Master</li>

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.category') }}">
          <i class="bx bx-purchase-tag-alt"></i>
          <span>Categories</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.tag') }}">
          <i class="bx bx-purchase-tag-alt"></i>
          <span>Tags</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.users') }}">
            <i class="bx bxs-user-detail"></i>
          <span>Users</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @if(@session('failed'))
    <div id="alert-failed" class="alert-custom alert-failed">
      <span class="fw-bold">X</span> {{ session('failed') }}
            <div class="progress-bar"></div>
    </div>
    @endif
    @if(@session('success'))
    <div id="alert-success" class="alert-custom alert-successs">
      <i class="bi bi-check-circle"></i> {{ session('success') }}
      <div class="progress-bar"></div>
    </div>
    @endif
    

    @yield('content')

    @stack('scripts')

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer> --}}
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }} "></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }} "></script>
  {{-- <script src="{{ asset('assets/vendor/quill/quill.js') }} "></script> --}}

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
  
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }} "></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }} "></script>

  {{-- Script Quill --}}
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }} "></script>
  <script src="{{ asset('assets/js/master.js') }}"></script>
  <script src="{{ asset('assets/js/quill.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/media-library.js') }}"></script> --}}

</body>

</html>