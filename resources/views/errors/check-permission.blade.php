<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>403</h1>
        <h2>You do not have permission to access for this page.</h2>
        <a class="btn" href="{{ url()->previous() }}">Back to home</a>
        <img src="{{ URL::asset('img/not-found.svg')}}" class="img-fluid py-5" alt="Forbiden">
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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