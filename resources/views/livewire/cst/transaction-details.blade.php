<div>
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
                <h3 class="title">Recently Transactios</h3>
                <a class="sub-delete" href="#"><i class="fa fa-trash"></i></a>
            </div>
            <div class="balance-area-bg bg-transaction-details">
                <div class="text-center balance-title">
                    <h6>Here is your transactios <br> details history</h6>
                </div>
                <div class="text-center ba-balance-inner"
                    style="background-image: url({{ @asset('cst/img/bg/2.png') }});">
                    <div class="icon">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <h5 class="title">Pyment Sent</h5>
                    <h5 class="amount">KES {{ number_format($transaction->value) }}</h5>
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
                            <i class="fa fa-times"></i>
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
                    <span class="float-left">Transaction Category</span>
                    <span class="float-right">Repayment</span>
                </li>
                <li>
                    <span class="float-left">Purchase Receipt</span>
                    <span class="float-right">Yes</span>
                </li>
                <li>
                    <span class="float-left">Purchase Date</span>
                    <span class="float-right">{{ date('d M Y h:iA', strtotime($transaction->created_at)) }}</span>
                </li>
                <li>
                    <span class="float-left">Total Amounts</span>
                    <span class="float-right">$757.00</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <div class="text-center btn-wrap mg-top-40">
        <div class="container">
            <p class="btn-content-text">If haveing any transaction issue, Please <a href="javascript:void(0);">contact
                    us</a>
            </p>
        </div>
    </div>
</div>
