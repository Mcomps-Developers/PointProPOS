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
                        <i class="fa fa-arrow-down"></i>
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
                    <span class="float-left">Paid</span>
                    <span class="float-right"
                        style="text-transform: uppercase">{{ number_format($invoice->repayments()->sum('amount_paid'), 2) }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="bill-pay-area pd-top-36">
        <div class="container">
            <div class="text-center section-title style-three">
                <h3 class="title">Payment Installments</h3>
            </div>
            @foreach ($schedules as $item)
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="details">
                            <h5>{{ date('d M Y', strtotime($item->date_due)) }}</h5>
                            <p class="badge badge-success">
                                @if ($item->payment_date)
                                    Paid: {{ date('d M Y', strtotime($item->payment_date)) }}
                                @endif
                            </p>
                            <p style="text-transform: capitalize">
                                @if ($item->status === 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-danger">Not Paid</span>
                                    @php
                                        $dueDate = \Carbon\Carbon::parse($item->date_due);
                                        $today = \Carbon\Carbon::today();
                                        $tomorrow = \Carbon\Carbon::tomorrow();
                                    @endphp

                                    @if ($dueDate->lessThan($today))
                                        <span class="badge badge-danger">Overdue</span>
                                    @elseif ($dueDate->equalTo($today))
                                        <span class="badge badge-warning">Due Today</span>
                                    @elseif ($dueDate->equalTo($tomorrow))
                                        <span class="badge badge-primary">Due Tomorrow</span>
                                    @elseif ($dueDate->greaterThanOrEqualTo($tomorrow))
                                        {{-- Do nothing or handle cases where due date is later than tomorrow --}}
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="amount-inner">
                        <h5 class="text-success">KES {{ number_format($item->amount_paid, 2) }}</h5>
                        @if ($item->status === 'not_paid')
                            <a class="btn btn-blue intaSendPayButton" href="javascript:void(0);"
                                data-amount="{{ $item->amount - $item->amount_paid }}" data-currency="KES"
                                data-email="{{ $item->invoice->customer->email }}"
                                data-first_name="{{ $item->invoice->customer->name }}" data-last_name=""
                                data-phone_number="{{ $item->invoice->customer->phone_number }}"
                                data-api_ref="{{ $item->id }}" data-country="KE">Pay KES
                                {{ number_format($item->amount - $item->amount_paid, 2) }}</a>
                        @else
                            <a class="btn btn-success" href="javascript:void(0);">Paid</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="bill-pay-area pd-top-36">
        <div class="container">
            <div class="text-center section-title style-three">
                <h3 class="title">Invoice Products</h3>
            </div>
            @foreach ($products as $item)
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/products') }}/{{ $item->product->image }}">
                        </div>
                        <div class="details">
                            <h5>{{ $item->product->name }}</h5>
                            <p style="text-transform: uppercase">SKU: {{ $item->product->sku }}</p>
                        </div>
                    </div>
                    <div class="amount-inner">
                        <h5>KES {{ number_format($item->amount, 2) }} * {{ $item->qty }} (Qty)</h5>
                        <a class="btn btn-gray" href="javascript:void(0);">KES
                            {{ number_format($item->qty * $item->amount, 2) }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center btn-wrap mg-top-40">
        <div class="container">
            <p class="btn-content-text">If having any issue, Please <a href="javascript:void(0);">contact
                    us</a>
            </p>
        </div>
    </div>
</div>
<script src="https://unpkg.com/intasend-inlinejs-sdk@3.0.4/build/intasend-inline.js"></script>
<script>
    new window.IntaSend({
            publicAPIKey: '{{ env('INTASEND_PUB_KEY') }}',
            live: true
        })
        .on("COMPLETE", (results) => {
            // console.log("Success", results);
            saveTransactionToController(results);
        })
        .on("FAILED", (results) => {
            // console.log("Failed", results);
            saveTransactionToController(results);
        })
        .on("RETRY", (results) => {
            // console.log("Retry", results);
            saveTransactionToController(results);
        })
        .on("IN-PROGRESS", (results) => console.log("Payment in progress status", results));

    function saveTransactionToController(results) {
        console.log('Results:', results); // Log the results

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const url = '{{ env('REPAYMENT_CALL_BACK') }}';

        console.log('Sending request to:', url); // Log the URL being requested

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    results: results
                })
            })
            .then(response => {
                console.log('Response received:', response); // Log the response received

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Check if the response body is empty
                if (response.headers.get('Content-Length') === '0') {
                    // Response body is empty, return an empty object
                    return {};
                }
                // Log the response body
                return response.text().then(text => {
                    console.log('Response body:', text);
                    return text ? JSON.parse(text) : {};
                });
            })
            .then(data => {
                console.log('Response data:', data); // Log the response data

                // Reload the current page
                window.location.reload();
            })
            .catch(error => console.error('Error saving transaction:', error));

    }
</script>
