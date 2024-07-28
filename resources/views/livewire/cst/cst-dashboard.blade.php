<div>
    @section('title')
        Account
    @endsection

    <!-- navbar end -->

    <!-- navbar end -->
    {{-- <div class="add-balance-inner-wrap">
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
                                    <label class="label">Enter Amount</label>
                                    <div class="mb-3 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">KES </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="10">
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
    </div> --}}
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="text-center balance-title">
                    <h6>Hello {{ Auth::user()->name }}!
                        <br>
                        Welcome to {{ config('app.name') }}
                    </h6>
                    <div class="text-center ba-balance-inner" style="background-image: url(cst/img/bg/2.png);">
                        <div class="icon">
                            <img src="{{ asset('cst/img/icon/1.png') }}" alt="img">
                        </div>
                        <h5 class="title">Wallet</h5>
                        <h5 class="amount">KES {{ number_format(Auth::user()->wallet->balance, 2) }}</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- balance End -->

    <!-- add balance start -->
    <div class="add-balance-area pd-top-40">
        <div class="container">
            <div class="ba-add-balance-title ba-add-balance-btn">
                <h5>Top Up</h5>
                <i class="fa fa-plus"></i>
            </div>
            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <a class="btn btn-blue ba-add-balance-btn" href="#">Withdraw <i
                                class="fa fa-arrow-down"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-red ba-add-balance-btn" href="#">Send <i
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
                <h3 class="title">Invoices</h3>
                <a href="{{ route('cst.invoices') }}">View All</a>
            </div>
            @foreach ($invoices as $item)
                @if ($item->type === 'pay_later')
                    <div class="single-goal single-goal-three">
                        <div class="row">
                            <div class="pr-0 col-7">
                                <div class="details">
                                    <h6 style="text-transform: uppercase"><a
                                            href="{{ route('cst.invoice.details', ['reference' => $item->reference]) }}">INV-{{ $item->reference }}-PP</a>
                                    </h6>
                                    <p>
                                        @if ($item->type === 'pay_later')
                                            Credit | {{ $item->company->name }}
                                        @else
                                            Saving | {{ $item->company->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="pl-0 col-5">
                                @if ($item->type === 'pay_later')
                                    <div class="circle-inner circle-inner-three">
                                    @else
                                        <div class="circle-inner circle-inner-one">
                                @endif
                                <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                <div class="chart-circle"
                                    data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                    <canvas width="52" height="52"></canvas>
                                    <div class="text-center chart-circle-value">
                                        {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="single-goal single-goal-one">
                        <div class="row">
                            <div class="pr-0 col-7">
                                <div class="details">
                                    <h6 style="text-transform: uppercase"><a
                                            href="{{ route('cst.invoice.details', ['reference' => $item->reference]) }}">INV-{{ $item->reference }}-PP</a>
                                    </h6>
                                    <p>
                                        @if ($item->type === 'pay_later')
                                            Credit | {{ $item->company->name }}
                                        @else
                                            Saving | {{ $item->company->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="pl-0 col-5">
                                @if ($item->type === 'pay_later')
                                    <div class="circle-inner circle-inner-three">
                                    @else
                                        <div class="circle-inner circle-inner-one">
                                @endif
                                <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                <div class="chart-circle"
                                    data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                    <canvas width="52" height="52"></canvas>
                                    <div class="text-center chart-circle-value">
                                        {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- goal area End -->

    <!-- history start -->
    <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">My Summary</h3>
            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-four"
                            style="background-image: url({{ @asset('cst/img/bg/3.png') }});">
                            <h6>Save</h6>
                            <h5>KES {{ $invoices->where('type', 'collect_later')->sum('amount') }}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-two"
                            style="background-image: url({{ @asset('cst/img/bg/3.png') }});">
                            <h6>Credit</h6>
                            <h5>KES {{ $invoices->where('type', 'pay_later')->sum('amount') }}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-three"
                            style="background-image: url({{ @asset('cst/img/bg/3.png') }});">
                            <h6>Repayments</h6>
                            <h5>KES {{ $paidAmount }}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-three"
                            style="background-image: url({{ @asset('cst/img/bg/3.png') }});">
                            <h6>Due</h6>
                            <h5>KES {{ $invoices->sum('amount') - $paidAmount }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Transactions</h3>
                <a href="#">View All</a>
            </div>
            <ul class="transaction-inner">
                @foreach ($repayments as $item)
                    <li class="ba-single-transaction">
                        @php
                            $schedule = \App\Models\PaymentSchedule::findOrFail($item->api_ref);
                        @endphp
                        <a href="{{ route('transaction.details', ['tracking_id' => $item->tracking_id]) }}">
                            <div class="details">
                                <h5 style="text-transform: uppercase">INV-{{ $schedule->invoice->reference }}-PP -
                                    {{ date('d M Y', strtotime($schedule->date_due)) }}</h5>
                                @if ($item->state === 'COMPLETE')
                                    <p>Successful at {{ date('d M Y h:iA', strtotime($item->created_at)) }}</p>
                                @else
                                    <p class="text-danger">Failed at
                                        {{ date('d M Y h:iA', strtotime($item->created_at)) }}
                                        <br>
                                        <small class="text-danger">{{ $item->failed_reason }}</small>
                                    </p>
                                @endif

                                <h5 class="amount">- KES {{ $schedule->amount_paid }}</h5>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- transaction End -->
</div>
