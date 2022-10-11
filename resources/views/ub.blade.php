<!doctype html>
<html lang="en">


<!-- Mirrored from maxartkiller.com/website/finwallapp2/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 09:02:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="{{asset('asset/manifest.json')}}" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('asset/img/favicon180.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('asset/img/favicon32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('asset/img/favicon16.png')}}" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{asset('asset/cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css')}}">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{asset('asset/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}">
    <!-- style css for this template -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet" id="style">
    @yield('css')
</head>

<body class="body-scroll" data-page="index">

    <!-- loader section -->
    <x-loader></x-loader>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <x-usidebar></x-usidebar>
    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
      <x-uheader></x-uheader>
        <!-- Header ends -->

        <!-- main page content -->
        @yield('content')
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->

    <!-- Footer -->
    
    <footer class="footer">
    </footer>
    <!-- Menu Modal -->

    <!-- Footer ends-->

  

    <!-- Required jquery and libraries -->
    <script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Customized jquery file  -->
    <script src="{{asset('asset/js/main.js')}}"></script>
    <script src="{{asset('asset/js/color-scheme.js')}}"></script>



    <!-- Chart js script -->
    <script src="{{asset('asset/vendor/chart-js-3.3.1/chart.min.js')}}"></script>

    <!-- Progress circle js script -->
    <script src="{{asset('asset/vendor/progressbar-js/progressbar.min.js')}}"></script>

    <!-- swiper js script -->
    <script src="{{asset('asset/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>

    <!-- page level custom script -->
    <script src="{{asset('asset/js/app.js')}}"></script>
    @stack('js')

</body>


<!-- Mirrored from maxartkiller.com/website/finwallapp2/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 09:02:56 GMT -->
</html>