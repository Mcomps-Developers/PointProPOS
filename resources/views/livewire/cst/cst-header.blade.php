<div class="header-area" style="background-image: url({{ @asset('cst/img/bg/1.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-3">
                <div class="menu-bar">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="text-center col-sm-4 col-4">
                <a href="{{ route('cst.dashboard') }}" class="logo">
                    <h3 class="text-white">@yield('title')</h3>
                </a>
            </div>
            <div class="text-right col-sm-4 col-5">
                <ul class="header-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            <span class="badge">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cst.notifications') }}">
                            <i class="fa fa-bell animated infinite swing"></i>
                            <span class="badge">{{ $unreadNotifications->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="header-user" href="javascript:void(0);"><img
                                src="{{ Auth::user()->profile_photo_url }}" style="transform: scale(0.5)"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ba-navbar">
        <div class="ba-navbar-user">
            <div class="menu-close">
                <i class="la la-times"></i>
            </div>
            <div class="thumb">
                <img src="{{ Auth::user()->profile_photo_url }}" style="transform: scale(0.5)">
            </div>
            <div class="details">
                <h5>{{ Auth::user()->name }}</h5>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Tel: {{ Auth::user()->phone_number }}</p>
            </div>
        </div>
    </div>
</div>
