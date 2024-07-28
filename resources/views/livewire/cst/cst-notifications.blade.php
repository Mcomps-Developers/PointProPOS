<div>
    @section('title')
        Notifications
    @endsection
    <div>
        <div class="header-area" style="background-image: url({{ @asset('cst/img/bg/1.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <a class="menu-back-page" href="{{ route('cst.dashboard') }}">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                    <div class="text-center col-sm-4 col-6">
                        <div class="page-name">Notifications</div>
                    </div>
                    <div class="text-right col-sm-4 col-3">
                        <div class="search header-search">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.dashboard') }}">Home</a>
            <span class="float-right">Notifications</span>
        </div>
    </div>
    <!-- page-title end -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Inbox Notifications</h3>
                <a href="#"><i class="fa fa-bell"></i></a>
            </div>
            <div class="mb-2 text-center btn-wrap-area">
                <a class="mb-1 mr-2 btn btn-red" href="#">Message 0</a>
                <a class="mb-1 ml-2 btn btn-purple" href="#">Notification {{ $unreadNotifications->count() }}</a>
            </div>
            @foreach ($allNotifications as $notification)
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="details">
                            <h5>{{ $notification->data['title'] }}</h5>
                            <p>{{ $notification->data['message'] }}</p>
                        </div>
                    </div>
                    <div class="amount-inner">
                        <h5><i
                                class="fa fa-long-arrow-right"></i>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                        </h5>

                        @if ($notification->read_at)
                            <a class="btn btn-gray" href="#">Read</a>
                        @else
                            <a class="btn btn-blue" href="javascript:void(0);"
                                wire:click="markNotificationAsRead('{{ $notification->id }}')">Mark as Read</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
