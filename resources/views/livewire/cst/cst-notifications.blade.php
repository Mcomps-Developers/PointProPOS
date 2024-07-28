<div>
    @section('title')
        Notifications
    @endsection
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
                <a class="mb-1 mr-2 btn btn-red" href="#">Unread {{ $unreadNotifications->count() }}</a>
                <a class="mb-1 ml-2 btn btn-purple" href="#">All {{ $allNotifications->count() }}</a>
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
