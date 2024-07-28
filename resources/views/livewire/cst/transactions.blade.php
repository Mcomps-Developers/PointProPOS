<div>
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.dashboard') }}">Home</a>
            <span class="float-right">Transactions</span>
        </div>
    </div>
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Recent Transactions</h3>
                <a href="#"><i class="fa fa-bell"></i></a>
            </div>
            <ul class="transaction-inner">
                @foreach ($transactions as $item)
                @php
                    $schedule = \App\Models\PaymentSchedule::findOrFail($transaction->api_ref);
                @endphp
                    <li class="ba-single-transaction style-two">
                        <div class="details">
                            <h5>INV-{{ $schedule->invoice->reference }}-PP</h5>
                            <p>{{ date('d M Y', strtotime($schedule->date_due)) }}</p>
                            <h5 class="amount">KES {{ number_format($item->value, 2) }}</h5>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Yesterday Transctions</h3>
            </div>
            <ul class="transaction-inner">
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$160</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$890</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$1,000</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">03 Mar 2020</h3>
            </div>
            <ul class="transaction-inner">
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$160</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$890</h5>
                    </div>
                </li>
                <li class="ba-single-transaction style-two">
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$1,000</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <div class="btn-wrap mg-top-40">
        <div class="container">
            <a class="btn-large btn-blue w-100" href="#">More Transctios <i
                    class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
</div>
