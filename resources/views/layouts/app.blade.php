<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('cst/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('cst/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cst/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    {{-- <div class="modal fade fade-modal-nitification" id="overlay">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="thumb">
                            <img src="{{ asset('cst/img/icon/6.png') }}" alt="img">
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
    </div> --}}
    <!-- auto notification end -->

    <!-- header start -->
    @livewire('cst.cst-header')
    <!-- header end -->

    {{ $slot }}

    <!-- Footer Area -->
    <div class="text-center footer-top" style="background-image: url(cst/img/bg/7.png);">
        <div class="container">
            <p>© {{ config('app.name') }} {{ date('Y') }}. All Rights Reserved. Powered by <a
                    href="https://mcomps.africa">Mcomps</a></p>
        </div>
    </div>
    <div class="footer-area">
        <div class="container" style="transform: scale(1)">
            <div class="text-center footer-bottom">
                <ul>

                    <li>
                        <a href="{{ route('cst.dashboard') }}">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cst.invoices') }}">
                            <i class="fas fa-wallet"></i>
                            <p>Invoices</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cst.transactions') }}">
                            <i class="fa fa-file-invoice"></i>
                            <p>Transactions</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fa fa-lock"></i>
                            <p>Logout</p>
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
    <script src="{{ asset('cst/js/vendor.js') }}"></script>
    <script src="{{ asset('cst/js/main.js') }}"></script>
    <script>
        const subscribe = async () => {
            try {
                const serviceWorkerRegistration = await navigator.serviceWorker.register('/service-worker.js');
                const subscription = await serviceWorkerRegistration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: env(VAPID_PUBLIC_KEY) // get from step 3
                });

                //store device subscription token to User's Table Column name "device_token"
                axios.post('/store-device-token', {
                    device_token: subscription.toJSON()
                })

            } catch (error) {
                console.error('Error subscribing to push notifications:', error);
                alert('Error subscribing to push notifications. Please try again.');
            }
        };
    </script>
    @livewireScripts

</body>



</html>
