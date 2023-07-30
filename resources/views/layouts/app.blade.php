<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Favicons -->
  <link href="{{ URL::asset('img/favicon.png');}}" rel="icon">
  <link href="{{ URL::asset('img/apple-touch-icon.png');}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/bootstrap-icons/bootstrap-icons.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/boxicons/css/boxicons.min.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/quill/quill.snow.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/quill/quill.bubble.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/remixicon/remixicon.css');}}" rel="stylesheet">
  <link href="{{URL::asset('vendor/simple-datatables/style.css');}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('css/style.css');}}" rel="stylesheet">



    @vite('resources/js/app.js')
</head>
<body>


@guest
    @yield('content')

    @else

    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="{{ session('home') }}" class="logo d-flex align-items-center">
    <img src="{{ URL::asset('img/logo.png');}}" alt="">
    <span class="d-none d-lg-block">PMS</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ Auth::user()->name }}</h6>
          <span>{{ Auth::user()->type }}</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>

        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

@if ( $userRole === 'admin')
    <!-- ======= Admin Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('admin.home')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading"><hr></li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>List of Check In and Out</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('admin.checkin')}}">
          <i class="bi bi-circle"></i><span>Check In</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.checkout')}}">
          <i class="bi bi-circle"></i><span>Check Out</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  

</ul>

</aside><!-- End Sidebar-->
    @elseif ( $userRole === 'manager' )
    <!-- ======= Manager Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Check In and Out</span>
    </a>
  </li><!-- End Dashboard Nav -->

</ul>

</aside><!-- End Manager Sidebar-->
        @else
        <h2>no sidebar</h2>
    @endif

</header><!-- End Header -->



<main id="main" class="main">
@yield('content')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
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
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
@endguest

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('vendor/apexcharts/apexcharts.min.js');}}"></script>
  <script src="{{ URL::asset('vendor/chart.js/chart.umd.js');}}"></script>
  <script src="{{ URL::asset('vendor/echarts/echarts.min.js');}}"></script>
  <script src="{{ URL::asset('vendor/quill/quill.min.js');}}"></script>
  <script src="{{ URL::asset('vendor/simple-datatables/simple-datatables.js');}}"></script>
  <script src="{{ URL::asset('vendor/tinymce/tinymce.min.js');}}"></script>
  <script src="{{ URL::asset('vendor/php-email-form/validate.js');}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::asset('js/main.js'); }}"></script>
    
</body>

</html>
