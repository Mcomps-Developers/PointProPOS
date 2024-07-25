<div>
    @section('title')
        My Account
    @endsection
    <div class="ba-navbar">
        <div class="ba-navbar-user">
            <div class="menu-close">
                <i class="la la-times"></i>
            </div>
            <div class="thumb">
                <img src="{{ asset('cst/img/user.png') }}" alt="user">
            </div>
            <div class="details">
                <h5>Raduronto kelax</h5>
                <p>ID: 99883323</p>
            </div>
        </div>
        <div class="ba-add-balance-title">
            <h5>Add Balance</h5>
            <p>$458786.00</p>
        </div>
        <div class="ba-add-balance-title style-two">
            <h5>Deposit</h5>
            <i class="fa fa-plus"></i>
        </div>
        <div class="ba-main-menu">
            <h5>Menu</h5>
            <ul>
                <li><a href="{{ route('cst.dashboard') }}">Bankapp Display</a></li>
                <li><a href="all-page.html">Pages</a></li>
                <li><a href="component.html">Components</a></li>
                <li><a href="carts.html">My Cart</a></li>
                <li><a href="user-setting.html">Setting</a></li>
                <li><a href="notiFication-2.html">Notification</a></li>
                <li><a href="signup.html">Logout</a></li>
            </ul>
            <a class="btn btn-purple" href="#">View Profile</a>
        </div>
    </div>
    <!-- navbar end -->

    <!-- navbar end -->
    <div class="add-balance-inner-wrap">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Investment (*** 7284)</option>
                                            <option value="1">Savings (*** 5078)</option>
                                            <option value="2">Deposit (*** 2349)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="mb-3 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">$</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" value="768">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn-c btn-primary btn-block btn-lg"
                                        data-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="text-center balance-title">
                    <h6>Welcome! <br> {{ Auth::user()->name }} - {{ config('app.name') }}</h6>
                </div>
                <div class="text-center ba-balance-inner" style="background-image: url(cst/img/bg/2.png);">
                    <div class="icon">
                        <img src="{{ asset('cst/img/icon/1.png') }}" alt="img">
                    </div>
                    <h5 class="title">Total Balance</h5>
                    <h5 class="amount">$56,985.00</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- balance End -->

    <!-- add balance start -->
    <div class="add-balance-area pd-top-40">
        <div class="container">
            <div class="ba-add-balance-title ba-add-balance-btn">
                <h5>Add Balance</h5>
                <i class="fa fa-plus"></i>
            </div>
            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <a class="btn btn-blue ba-add-balance-btn" href="#">Withdraw <i
                                class="fa fa-arrow-down"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-red ba-add-balance-btn" href="#">Recharge <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add balance End -->

    <!-- goal area Start -->
    <div class="goal-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Credit Purchases</h3>
                <a href="#">View All</a>
            </div>
            @foreach ($invoices as $item)
                <div class="single-goal single-goal-one">
                    <div class="row">
                        <div class="pr-0 col-7">
                            <div class="details">
                                <h6 style="text-transform: uppercase">INV-{{ $item->reference }}-PP</h6>
                                <p>
                                    @if ($item->type === 'pay_later')
                                        Loan | {{ $item->company->name }}
                                    @else
                                        Installement | {{ $item->company->name }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="pl-0 col-5">
                            <div class="circle-inner circle-inner-one">
                                <h6 class="goal-amount">$130</h6>
                                <div class="chart-circle" data-value="0.30">
                                    <canvas width="52" height="52"></canvas>
                                    <div class="text-center chart-circle-value">
                                        {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="single-goal single-goal-two">
                <div class="row">
                    <div class="pr-0 col-7">
                        <div class="details">
                            <h6>App Store</h6>
                            <p>Technology</p>
                        </div>
                    </div>
                    <div class="pl-0 col-5">
                        <div class="circle-inner circle-inner-two">
                            <h6 class="goal-amount">$1065</h6>
                            <div class="chart-circle" data-value="0.90">
                                <canvas width="52" height="52"></canvas>
                                <div class="text-center chart-circle-value">90%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-three">
                <div class="row">
                    <div class="pr-0 col-7">
                        <div class="details">
                            <h6>Gaming Software</h6>
                            <p>Development</p>
                        </div>
                    </div>
                    <div class="pl-0 col-5">
                        <div class="circle-inner circle-inner-three">
                            <h6 class="goal-amount">$580</h6>
                            <div class="chart-circle" data-value="0.60">
                                <canvas width="52" height="52"></canvas>
                                <div class="text-center chart-circle-value">60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-four">
                <div class="row">
                    <div class="pr-0 col-7">
                        <div class="details">
                            <h6>Racing Car</h6>
                            <p>Playing</p>
                        </div>
                    </div>
                    <div class="pl-0 col-5">
                        <div class="circle-inner circle-inner-four">
                            <h6 class="goal-amount">$980</h6>
                            <div class="chart-circle" data-value="0.60">
                                <canvas width="52" height="52"></canvas>
                                <div class="text-center chart-circle-value">60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- goal area End -->

    <!-- history start -->
    <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">History</h3>
                <a href="#">View All</a>
            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one"
                            style="background-image: url(cst/img/bg/3.png);">
                            <h6>Income</h6>
                            <h5>$58,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-two"
                            style="background-image: url(cst/img/bg/3.png);">
                            <h6>Expenses</h6>
                            <h5>$50,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-three"
                            style="background-image: url(cst/img/bg/3.png);">
                            <h6>Total Bills</h6>
                            <h5>$50,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-four"
                            style="background-image: url(cst/img/bg/3.png);">
                            <h6>Savings</h6>
                            <h5>$58.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history End -->

    <!-- cart start -->
    <div class="cart-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">My Cart</h3>
                <a href="#">View All</a>
            </div>
            <div class="ba-cart-inner" style="background-image: url(cst/img/bg/4.png);">
                <p>Balance</p>
                <h4>$56,985.00</h4>
                <p>Card Number</p>
                <h5>0000 0000 0000 0909</h5>
                <div class="row">
                    <div class="col-4">
                        <p>Expiry</p>
                        <h5>12/10</h5>
                    </div>
                    <div class="col-8">
                        <p>CCV</p>
                        <h5>513</h5>
                    </div>
                </div>
                <p>aron smith</p>
            </div>
        </div>
    </div>
    <!-- cart End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Transactions</h3>
                <a href="#">View All</a>
            </div>
            <ul class="transaction-inner">
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="cst/img/icon/2.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="cst/img/icon/3.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="cst/img/icon/4.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="cst/img/icon/5.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <!-- send-money start -->
    <div class="send-money-area pd-top-36 pd-bottom-40 mg-top-40" style="background-image: url(cst/img/bg/5.png);">
        <div class="container">
            <div class="section-title style-two">
                <h3 class="title">Send Money</h3>
                <a href="#">View All</a>
            </div>
        </div>
        <div class="send-money-slider owl-carousel">
            <div class="item">
                <div class="single-send-money">
                    <img src="cst/img/send-money/1.png" alt="img">
                    <p>Alex Smith</p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="cst/img/send-money/2.png" alt="img">
                    <p>Mariano </p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="cst/img/send-money/3.png" alt="img">
                    <p>Karitika</p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="cst/img/send-money/4.png" alt="img">
                    <p>Jhone</p>
                </div>
            </div>
        </div>
    </div>
    <!-- send-money End -->

    <!-- bill-pay start -->
    <div class="bill-pay-area pd-top-36">
        <div class="container">
            <div class="text-center section-title style-three">
                <h3 class="title">Pay Your Monthly Bill</h3>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="cst/img/icon/6.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Envato.com</h5>
                        <p>Standard Elements Services Subscribtion</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$169</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="cst/img/icon/3.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Apple.com</h5>
                        <p>Apple Laptop Monthly Pay System.</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$130</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="cst/img/icon/4.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Amazon.com</h5>
                        <p>Standard Domain Services Subscribtion</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$130</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="mt-4 text-center btn-wrap">
                <a class="readmore-btn" href="#">View All</a>
            </div>
        </div>
    </div>
    <!-- bill-pay End -->

    <!-- blog-area start -->
    <div class="pb-2 blog-area pd-top-36 mg-top-40" style="background-image: url(cst/img/bg/6.png);">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Recent Posts</h3>
                <a href="#">View All</a>
            </div>
            <div class="blog-slider owl-carousel">
                <div class="item">
                    <div class="single-blog">
                        <div class="thumb">
                            <img src="cst/img/blog/1.png" alt="img">
                        </div>
                        <div class="details">
                            <a href="blog-details.html">How to save your money in own business firm.</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-blog">
                        <div class="thumb">
                            <img src="cst/img/blog/2.png" alt="img">
                        </div>
                        <div class="details">
                            <a href="blog-details.html">How to save your money in own business firm.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area End -->
</div>
