<div>
    @section('title')
        Invoices
    @endsection
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
                                        <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                        <div class="chart-circle"
                                            data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                            <canvas width="52" height="52"></canvas>
                                            <div class="text-center chart-circle-value">
                                                {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="circle-inner circle-inner-one">
                                        <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                        <div class="chart-circle"
                                            data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                            <canvas width="52" height="52"></canvas>
                                            <div class="text-center chart-circle-value">
                                                {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                        <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                        <div class="chart-circle"
                                            data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                            <canvas width="52" height="52"></canvas>
                                            <div class="text-center chart-circle-value">
                                                {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="circle-inner circle-inner-one">
                                        <h6 class="goal-amount">KES {{ $item->amount }}</h6>
                                        <div class="chart-circle"
                                            data-value="{{ ($item->repayments->sum('amount_paid') / $item->amount) * 1000 }}">
                                            <canvas width="52" height="52"></canvas>
                                            <div class="text-center chart-circle-value">
                                                {{ number_format(($item->repayments->sum('amount_paid') / $item->amount) * 100) }}%
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{ $invoices->links('pagination::bootstrap-5') }}
    </div>
</div>
