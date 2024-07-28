<div>
    @section('title')
        Invoice
    @endsection
    <!-- page-title end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Invoice Details</h3>
            </div>
            <div class="balance-area-bg bg-transaction-details">
                <div class="text-center balance-title">
                    <h6 style="text-transform: uppercase">INV-{{ $invoice->reference }}-PP</h6>
                </div>
                <div class="text-center ba-balance-inner"
                    style="background-image: url({{ @asset('cst/img/bg/2.png') }});">
                    <div class="icon">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <h5 class="title">Amount Due</h5>
                    <h5 class="amount">KES
                        {{ number_format($invoice->amount - $invoice->repayments()->sum('amount_paid')) }}/{{ number_format($invoice->amount, 2) }}
                    </h5>
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
                    <span class="float-left">Current Status: <span
                            style="text-transform: capitalize">{{ $invoice->status }}</span></span>
                    <span class="float-right">
                        @if ($invoice->status === 'complete')
                            <i class="fa fa-check-circle"></i>
                        @elseif ($invoice->status === 'progress')
                            <i class="text-white fas fa-spinner fa-spin"></i>
                        @elseif ($invoice->status === 'defaulted')
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        @elseif ($invoice->status === 'cancelled')
                            <i class="fas fa-ban text-danger"></i>
                        @elseif ($invoice->status === 'pending')
                            <i class="fas fa-hourglass-half text-info"></i>
                        @endif
                    </span>
                </li>
                <li>
                    <span class="float-left">Created</span>
                    <span class="float-right">{{ date('d M Y', strtotime($invoice->created_at)) }}</span>
                </li>
                <li>
                    <span class="float-left">First Repayment</span>
                    <span class="float-right"
                        style="text-transform: uppercase">{{ date('d M Y', strtotime($invoice->firt_repayment_date)) }}</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <div class="text-center btn-wrap mg-top-40">
        <div class="container">
            <p class="btn-content-text">If having any issue, Please <a href="javascript:void(0);">contact
                    us</a>
            </p>
        </div>
    </div>
</div>
