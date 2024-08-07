<div>
    @section('title')
        Transactions
    @endsection
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.dashboard') }}">Home</a>
            <span class="float-right">Transactions</span>
        </div>
    </div>
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Today Transactions</h3>
                <a href="#"><i class="fa fa-bell"></i></a>
            </div>
            <ul class="transaction-inner">
                @foreach ($transactions as $item)
                    @php
                        $schedule = \App\Models\PaymentSchedule::findOrFail($item->api_ref);
                    @endphp
                    <li class="ba-single-transaction style-two">
                        <a href="{{ route('transaction.details', ['tracking_id' => $item->tracking_id]) }}">
                            <div class="details">
                                <h5>INV-{{ $schedule->invoice->reference }}-PP</h5>
                                <p>Installment: {{ date('d M Y', strtotime($schedule->date_due)) }} |
                                    @if ($item->state === 'COMPLETE')
                                        <span class="text-success">Successful</span>
                                    @else
                                        <span class="text-danger">Failed</span>
                                    @endif
                                </p>
                                <h5 class="amount">KES {{ number_format($item->value) }}</h5>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="btn-wrap mg-top-40">
        <div class="container">
            <a class="btn-large btn-white w-100" href="javascript:void(0);">

            </a>
        </div>
    </div>
</div>
