<div>
    @section('title')
        Transaction Details
    @endsection
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.dashboard') }}">Home</a>
            <span class="float-right">Transactions</span>
        </div>
    </div>
    <!-- page-title end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Transaction Details</h3>
            </div>
            <div class="balance-area-bg bg-transaction-details">
                <div class="text-center balance-title">
                    <h6>{{ $transaction->tracking_id }}</h6>
                </div>
                <div class="text-center ba-balance-inner"
                    style="background-image: url({{ @asset('cst/img/bg/2.png') }});">
                    <div class="icon">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <h5 class="title">Transaction Amount</h5>
                    <h5 class="amount">KES {{ number_format($transaction->value, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- balance End -->

    <!-- transaction start -->
    <div class="transaction-details pd-top-36">
        <div class="container">
            <ul class="transaction-details-inner">
                <li class="transaction-details-title">
                    <span class="float-left">Payment Status</span>
                    <span class="float-right">
                        @if ($transaction->state === 'COMPLETE')
                            <i class="fa fa-check-circle"></i>
                        @else
                            <i class="fa fa-times text-danger"></i>
                        @endif

                    </span>
                </li>
                @php
                    $schedule = \App\Models\PaymentSchedule::findOrFail($transaction->api_ref);
                @endphp
                <li>
                    <span class="float-left">Installment</span>
                    <span class="float-right">{{ date('d M Y', strtotime($schedule->date_due)) }}</span>
                </li>
                <li>
                    <span class="float-left">Invoice</span>
                    <span class="float-right"
                        style="text-transform: uppercase">INV-{{ $schedule->invoice->reference }}-PP</span>
                </li>
                <li>
                    <span class="float-left">Return Receipt</span>
                    <span class="float-right">{{ $transaction->state }}</span>
                </li>
                <li>
                    <span class="float-left">Timestap</span>
                    <span class="float-right">{{ date('d M Y h:iA', strtotime($transaction->created_at)) }}</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <div class="text-center btn-wrap mg-top-40">
        <div class="container">
            <p class="btn-content-text">If having any transaction issue, Please <a href="{{ route('cst.contact') }}">contact
                    us</a>
            </p>
        </div>
    </div>
</div>
