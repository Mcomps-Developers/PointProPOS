<div class="header">

    <div class="header-left active">
        <a href="{{ route('user.dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.png') }}" style="transform: scale(1.2);">
        </a>
        <a href="{{ route('user.dashboard') }}" class="logo logo-white">
            <img src="{{ asset('assets/img/logo-white.png') }}" style="transform: scale(1.2);">
        </a>
        <a href="{{ route('user.dashboard') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" style="transform: scale(1.2);">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">

        {{-- <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#" class="dropdown">
                    <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown"
                        data-bs-auto-close="false">
                        <input type="text" placeholder="Search">
                        <div class="search-addon">
                            <span><i data-feather="x-circle" class="feather-14"></i></span>
                        </div>
                    </div>
                    <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuClickable">
                        <div class="search-info">
                            <h6><span><i data-feather="search" class="feather-16"></i></span>Recent Searches
                            </h6>
                            <ul class="search-tags">
                                <li><a href="javascript:void(0);">Products</a></li>
                                <li><a href="javascript:void(0);">Sales</a></li>
                                <li><a href="javascript:void(0);">Applications</a></li>
                            </ul>
                        </div>
                        <div class="search-info">
                            <h6><span><i data-feather="help-circle" class="feather-16"></i></span>Help</h6>
                            <p>How to Change Product Volume from 0 to 200 on Inventory management</p>
                            <p>Change Product Name</p>
                        </div>
                        <div class="search-info">
                            <h6><span><i data-feather="user" class="feather-16"></i></span>Customers</h6>
                            <ul class="customers">
                                <li>
                                    <a href="javascript:void(0);">{{ Auth::user()->name }}<img
                                            src="{{ Auth::user()->profile_photo_url }}" alt class="img-fluid"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Jonita<img
                                            src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt
                                            class="img-fluid"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Aaron<img
                                            src="{{ asset('assets/img/profiles/avatar-10.jpg') }}" alt
                                            class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        @if (Auth::user()->utype === 'man')
            {{-- <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link select-store" data-bs-toggle="dropdown">
                    <span class="user-info">
                        <span class="user-letter">
                            <img src="{{ asset('assets/img/store/store-01.png') }}" alt="Store Logo" class="img-fluid">
                        </span>
                        <span class="user-detail">
                            <span class="user-name">Select Store</span>
                        </span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/img/store/store-01.png') }}" alt="Store Logo" class="img-fluid">
                        Grocery Alpha
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/img/store/store-02.png') }}" alt="Store Logo" class="img-fluid">
                        Grocery Apex
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/img/store/store-03.png') }}" alt="Store Logo" class="img-fluid">
                        Grocery Bevy
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/img/store/store-04.png') }}" alt="Store Logo" class="img-fluid">
                        Grocery Eden
                    </a>
                </div>
            </li> --}}
        @endif

        {{-- <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <img src="{{ asset('assets/img/flags/us.png') }}" alt="Language" class="img-fluid">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item active">
                    <img src="{{ asset('assets/img/flags/us.png') }}" alt height="16"> English
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/fr.png') }}" alt height="16"> French
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/es.png') }}" alt height="16"> Spanish
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/de.png') }}" alt height="16"> German
                </a>
            </div>
        </li> --}}

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>
        {{-- <li class="nav-item nav-item-box">
            <a href="javascript:void(0);">
                <i data-feather="mail"></i>
                <span class="badge rounded-pill">0</span>
            </a>
        </li> --}}

        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i><span class="badge rounded-pill">{{ $unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti" wire:click.prevent='markAllNotificationsAsRead'>
                        Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach ($unreadNotifications as $notification)
                            <li class="notification-message">
                                <a href="javascript:void(0);"
                                    wire:click="markNotificationAsRead('{{ $notification->id }}')">
                                    <div class="media d-flex">
                                        <span class="flex-shrink-0 avatar">
                                            <i class="fa fa-check-circle"></i>
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span
                                                    class="noti-title">{{ $notification->data['title'] }}</span> <br>
                                                {{ $notification->data['message'] }}
                                            </p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="javascript:void(0);">View all Notifications</a>
                </div>
            </div>
        </li>
        @if (Auth::user()->utype === 'man')
            <li class="nav-item nav-item-box">
                {{-- <a href="{{ route('company.settings') }}"><i data-feather="settings"></i></a> --}}
            </li>
        @endif
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt class="img-fluid">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-role">
                            @if (Auth::user()->utype === 'adm')
                                Super Admin
                            @elseif (Auth::user()->utype === 'man')
                                Admin
                            @elseif (Auth::user()->utype === 'csr')
                                Cashier
                            @elseif (Auth::user()->utype === 'agt')
                                Agent
                            @else
                                Faker
                            @endif
                        </span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{ Auth::user()->profile_photo_url }}" alt>
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>{{ Auth::user()->name }}</h6>
                            <h5>
                                @if (Auth::user()->utype === 'adm')
                                    Super Admin
                                @elseif (Auth::user()->utype === 'man')
                                    Admin
                                @elseif (Auth::user()->utype === 'csr')
                                    Cashier
                                @elseif (Auth::user()->utype === 'agt')
                                    Agent
                                @else
                                    Faker
                                @endif
                            </h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('user.profile') }}"> <i class="me-2"
                            data-feather="user"></i>
                        My
                        Profile</a>
                    <hr class="m-0">
                    <a class="pb-0 dropdown-item logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><img
                            src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2"
                            alt="img">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
    </div>

</div>
