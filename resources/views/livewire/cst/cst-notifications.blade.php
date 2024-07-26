<div>
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.dashboard') }}">Home</a>
            <span class="float-right">Notification</span>
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
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
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
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="details">
                        <h5>Apple.com</h5>
                        <p>Apple Laptop Monthly Pay System.</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5><i class="fa fa-long-arrow-right"></i>$130</h5>
                    <a class="btn btn-gray" href="#">Read</a>
                </div>
            </div>
        </div>
    </div>
</div>
