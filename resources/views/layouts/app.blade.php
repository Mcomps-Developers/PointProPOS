<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('assets/cst/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cst/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cst/assets/css/responsive.css') }}">
    @livewireStyles
</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- auto notification start -->
    <div class="modal fade fade-modal-nitification" id="overlay">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="thumb">
                            <img src="{{ asset('assets/cst/assets/img/icon/6.png') }}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Recived Money By Aron Fince</h5>
                            <p>You have received a payment from Aorn Fice.</p>
                        </div>
                    </div>
                    <div class="amount-inner">
                        <h5><i class="fa fa-long-arrow-left"></i>$169</h5>
                        <a class="btn btn-blue" href="#">Read</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- auto notification end -->

    <!-- header start -->
    <div class="header-area" style="background-image: url({{ @asset('assets/cst/assets/img/bg/1.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <div class="menu-bar">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="text-center col-sm-4 col-4">
                    <a href="{{ route('cst.dashboard') }}" class="logo">
                        <img src="{{ asset('assets/cst/assets/img/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="text-right col-sm-4 col-5">
                    <ul class="header-right">
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="badge">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="notification.html">
                                <i class="fa fa-bell animated infinite swing"></i>
                                <span class="badge">6</span>
                            </a>
                        </li>
                        <li>
                            <a class="header-user" href="user-setting.html"><img
                                    src="{{ asset('assets/cst/assets/img/user.png') }}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    {{ $slot }}

    <!-- Footer Area -->
    <div class="footer-area">
        <div class="text-center footer-top" style="background-image: url(assets/cst/assets/img/bg/7.png);">
            <div class="container">
                <p>© {{ config('app.name') }} {{ date('Y') }}. All Rights Reserved. Designed By S7template</p>
            </div>
        </div>
        <div class="container">
            <div class="text-center footer-bottom">
                <ul>
                    <li>
                        <a href="{{ route('cst.dashboard') }}">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="all-page.html">
                            <i class="fa fa-file-text"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li>
                        <a href="component.html">
                            <i class="fa fa-plus"></i>
                            <p>Components</p>
                        </a>
                    </li>
                    <li>
                        <a class="menu-bar" href="#">
                            <i class="fa fa-bars"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li>
                        <a href="carts.html">
                            <i class="fa fa-home"></i>
                            <p>My Card</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- All Js File here -->
    <script src="{{ asset('assets/cst/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/cst/assets/js/main.js') }}"></script>
    @livewireScripts

</body>



</html>
