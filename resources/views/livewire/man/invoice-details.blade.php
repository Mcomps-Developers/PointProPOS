<div class="page-wrapper">
    @section('title')
        Invoice Report
    @endsection
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Invoice <span style="text-transform: uppercase">INV-{{ $invoice->reference }}PP </span>Report
                    </h4>
                    <h6>Manage Your Invoice Report</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                            src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img" /></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img" /></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
        </div>

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a href class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                        </div>
                    </div>
                    <div class="search-path">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img" /></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-sort">
                        <i data-feather="sliders" class="info-img"></i>
                        <select class="select">
                            <option>Sort by Date</option>
                            {{-- <option>25 9 23</option>
                            <option>12 9 23</option> --}}
                        </select>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="pb-0 card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="user" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Name</option>
                                        {{-- <option>Rose</option>
                                        <option>Kaitlin</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="stop-circle" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Status</option>
                                        {{-- <option>Paid</option>
                                        <option>Unpaid</option>
                                        <option>Overdue</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <div class="position-relative daterange-wraper">
                                        <input type="text" class="form-control" name="datetimes"
                                            placeholder="From Date - To Date" />
                                        <i data-feather="calendar" class="feather-14 info-img"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <a class="btn btn-filters ms-auto">
                                        <i data-feather="search" class="feather-search"></i>
                                        Search
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                                <th>Amount Paid</th>
                                <th>Amount Due</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $item)
                                <tr>
                                    <td>{{ date('d M Y', strtotime($item->date_due)) }}</td>
                                    <td>KES {{ $item->amount }}</td>
                                    <td>
                                        @if ($item->payment_date)
                                            {{ date('d M Y', strtotime($item->payment_date)) }}
                                        @else
                                            .........
                                        @endif
                                    </td>
                                    <td style="text-transform: capitalize">
                                        @if ($item->status === 'paid')
                                            <span class="badge badge-linesuccess">Paid</span>
                                        @else
                                            <span class="badge badge-linedanger">Not Paid</span>
                                            @php
                                                $dueDate = \Carbon\Carbon::parse($item->date_due);
                                                $today = \Carbon\Carbon::today();
                                                $tomorrow = \Carbon\Carbon::tomorrow();
                                            @endphp

                                            @if ($dueDate->lessThan($today))
                                                <span class="badge badge-warning">Overdue</span>
                                            @elseif ($dueDate->equalTo($today))
                                                <span class="badge badge-info">Due Today</span>
                                            @elseif ($dueDate->equalTo($tomorrow))
                                                <span class="badge badge-primary">Due Tomorrow</span>
                                            @elseif ($dueDate->greaterThanOrEqualTo($tomorrow))
                                                {{-- Do nothing or handle cases where due date is later than tomorrow --}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->amount_paid, 2) }}</td>
                                    <td>{{ number_format($item->amount - $item->amount_paid, 2) }}</td>
                                    <td style="text-transform: capitalize">
                                        @if ($item->status === 'not_paid')
                                            <button class="badge badge-linesuccess intaSendPayButton"
                                                data-amount="{{ $item->amount - $item->amount_paid }}"
                                                data-currency="KES" data-email="{{ $item->invoice->customer->email }}"
                                                data-first_name="{{ $item->invoice->customer->name }}"
                                                data-last_name=""
                                                data-phone_number="{{ $item->invoice->customer->phone_number }}"
                                                data-api_ref="{{ $item->id }}" data-country="KE"><span
                                                    class="badge badge-linesuccess">Payment</span></button>
                                        @else
                                            .........
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive dataview">
                    <table class="table dashboard-expired-products">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img
                                                    src="{{ asset('assets/img/products') }}/{{ $item->product->image }}">
                                            </a>
                                            <a href="javascript:void(0);">{{ $item->product->name }} </a>
                                        </div>
                                    </td>
                                    <td style="text-transform: uppercase"><a
                                            href="javascript:void(0);">{{ $item->product->sku }}</a></td>
                                    <td>KES {{ number_format($item->amount, 2) }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>KES {{ number_format($item->qty * $item->amount, 2) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
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
