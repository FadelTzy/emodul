<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 09:02:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>E - Modul App</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('asset/img/favicon180.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('asset/img/favicon32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('asset/img/favicon16.png') }}" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet"
        href="{{ asset('asset/cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css') }}">

    <!-- style css for this template -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signin">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="logo-wallet">
                    <div class="wallet-bottom">
                    </div>
                    <div class="wallet-cards"></div>
                    <div class="wallet-top">
                    </div>
                </div>
                <p class="mt-4"><span class="text-secondary">E-Modul App</span><br><strong>Please
                        wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100 ">
        <div class="row h-100">
            <div class="col-11 col-sm-11 mx-auto">
                <!-- header -->
                <div class="row">
                    <header class="header">
                        <div class="row">
                            <div class="col">
                                <div class="logo-small">
                                    <img src="{{ asset('asset/img/logo.png') }}" alt="" />
                                    <h5><span class="text-secondary fw-light">E-Modul App</span><br /></h5>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                            </div>
                        </div>
                    </header>
                </div>
                <!-- header ends -->
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Login</span><br />Ke Akun</h1>
                    <div class="form-group form-floating mb-3 is-valid">
                        <input type="text" class="form-control"  id="username" name="username"
                            placeholder="Username">
                        <label class="form-control-label" for="username">Username</label>
                    </div>

                    <div class="form-group form-floating is-invalid mb-3">
                        <input type="password" class="form-control " name="password" id="password"
                            placeholder="Password">
                        <label class="form-control-label" for="password">Password</label>
                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Enter valid Password" id="passworderror">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                    <p class="mb-3 text-end">
                        <a href="forgot-password.html" class="">
                            Lupa Password ?
                        </a>
                    </p>
                </div>
                <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                    <div class="row ">
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-default btn-lg shadow-sm">Login</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>




    <!-- Required jquery and libraries -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    <!-- page level custom script -->
    <script src="{{ asset('asset/js/app.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script src="{{ asset('asset/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('asset/js/pwa-services.js') }}"></script>

</body>


<!-- Mirrored from maxartkiller.com/website/finwallapp2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 09:02:33 GMT -->

</html>
