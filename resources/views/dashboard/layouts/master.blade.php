<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?? 'en' }}" dir="{{ (app()->getLocale() ?? 'en') === 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('assets')}}/images/logo/favicon.png" rel="icon" type="image/x-icon">
  <link href="{{asset('assets')}}/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
  <title>@yield('title','Dashbo8ard')</title>

  <!-- Animation css -->
    <link href="{{asset('assets')}}/vendor/animation/animate.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
          rel="stylesheet">

    <!--flag Icon css-->
    <link href="{{asset('assets')}}/vendor/flag-icons-master/flag-icon.css" rel="stylesheet" type="text/css">

    <!-- tabler icons-->
    <link href="{{asset('assets')}}/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">

    <!-- apexcharts css-->
    <link href="{{asset('assets')}}/vendor/apexcharts/apexcharts.css" rel="stylesheet" type="text/css">

    <!-- glight css -->
    <link href="{{asset('assets')}}/vendor/glightbox/glightbox.min.css" rel="stylesheet">

    <!-- Bootstrap css-->
    <link href="{{asset('assets')}}/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- simplebar css-->
    <link href="{{asset('assets')}}/vendor/simplebar/simplebar.css" rel="stylesheet" type="text/css">

    <!-- App css-->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet" type="text/css">

    <!-- Responsive css-->
    <link href="{{asset('assets')}}/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- tabler icons cdn -->

  @stack('styles')
</head>
<body>
<div class="app-wrapper">

  <div class="loader-wrapper">
    <div class="loader_24"></div>
  </div>

  @include('dashboard.includes.sidebar')

  <div class="app-content">
    <div class="">
      @include('dashboard.includes.header')

      <main>
        <div class="container-fluid">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  {{-- <div class="go-top">
    <span class="progress-value"><i class="ti ti-chevron-up"></i></span>
  </div> --}}
  <div class="go-top">
    <span class="progress-value"><i class="fas fa-arrow-up"></i></span>
</div>

  @include('dashboard.includes.footer')
</div>

{{-- Modals خاصة بكل صفحة --}}
@yield('modals')


<!-- latest jquery-->
<script src="{{asset('asse')}}/js/jquery-3.6.3.min.js"></script>

<!-- Bootstrap js-->
<script src="{{asset('asse')}}/vendor/bootstrap/bootstrap.bundle.min.js"></script>

<!-- Simple bar js-->
<script src="{{asset('asse')}}/vendor/simplebar/simplebar.js"></script>

<!-- phosphor js -->
<script src="{{asset('asse')}}/vendor/phosphor/phosphor.js"></script>

<!-- Glight js -->
<script src="{{asset('asse')}}/vendor/glightbox/glightbox.min.js"></script>

<!-- apexcharts-->
<script src="{{asset('asse')}}/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Customizer js-->
<script src="{{asset('asse')}}/js/customizer.js"></script>

<!-- Ecommerce js-->
<script src="{{asset('asse')}}/js/ecommerce_dashboard.js"></script>

<!-- App js-->
<script src="{{asset('asse')}}/js/script.js"></script>


@stack('page_js')

</body>
</html>
