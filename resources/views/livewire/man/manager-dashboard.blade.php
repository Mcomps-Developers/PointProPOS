<div class="page-wrapper">
    @section('title')
        Dashboard
    @endsection
    <div class="content">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash1.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters" data-count="{{ $wallet->balance }}">KES
                                {{ number_format($wallet->balance, 2) }}</span></h5>
                        <h6>Wallet</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash1 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash2.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters" data-count="{{ $amountDue }}">KES
                                {{ number_format($amountDue, 2) }}
                            </span></h5>
                        <h6>Total Due</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash2 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash3.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters" data-count="{{ $paidAmount }}">KES
                                {{ number_format($paidAmount, 2) }}</span></h5>
                        <h6>Paid</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash3 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash4.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters" data-count="{{ $invoicesAmount }}">KES
                                {{ number_format($invoicesAmount, 2) }}</span></h5>
                        <h6>Total Credit</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $customers }}</h4>
                        <h5>Customers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>0</h4>
                        <h5>Suppliers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>0</h4>
                        <h5>Purchase Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <img src="{{ asset('assets/img/icons/file-text-icon-01.svg') }}" class="img-fluid"
                            alt="icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>{{ $invoices }}</h4>
                        <h5>Credit Invoices</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 d-flex">
                <div class="mb-4 card flex-fill default-cover">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 card-title">Recent Transactions</h4>
                        <div class="view-all-link">
                            <a href="javascript:void(0);" class="view-all d-flex align-items-center">
                                View All<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right"
                                        class="feather-16"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table dashboard-recent-products">
                                <thead>
                                    <tr>

                                        <th>Reference #</th>
                                        <th>Timestamp</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Charges {{ env('CONVENIENCE_FEE') }}%</th>
                                        <th>Net</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($repayments as $item)
                                        <tr>
                                            <td>{{ $item->tracking_id }}<br>
                                                <small>
                                                    @if ($item->state === 'COMPLETE')
                                                        <span class="badge badge-linesuccess">Successful</span>
                                                    @else
                                                        <span class="badge badge-linedanger">Failed
                                                        </span>
                                                        <span title="{{ $item->failed_reason }}"
                                                            class="badge badge-linesuccess">
                                                            <i title="{{ $item->failed_reason }}"
                                                                class="fa fa-info-circle text-info"></i>
                                                        </span>
                                                    @endif
                                                </small>
                                            </td>
                                            <td>{{ date('d M Y h:iA', strtotime($item->created_at)) }}</td>
                                            <td style="text-transform: capitalize;">{{ $item->customer->name }}</td>
                                            <td>KES {{ number_format($item->value, 2) }}</td>
                                            @if ($item->state === 'COMPLETE')
                                                <td>KES {{ number_format($item->convenience_fee, 2) }}</td>
                                            @else
                                                <td>KES 0</td>
                                            @endif

                                            @if ($item->state === 'COMPLETE')
                                                <td>KES {{ number_format($item->value - $item->convenience_fee, 2) }}
                                                </td>
                                            @else
                                                <td>KES 0.00</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all" />
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Category</th>
                            {{-- <th>Brand</th> --}}
                            <th>Price</th>
                            {{-- <th>Unit</th> --}}
                            {{-- <th>Qty</th> --}}
                            <th>Created by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox" />
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="productimgname">
                                        <a href="javascript:void(0);" class="product-img stock-img">
                                            <img src="{{ asset('assets/img/products') }}/{{ $item->image }}" />
                                        </a>
                                        <a href="javascript:void(0);">{{ $item->name }}
                                        </a>
                                    </div>
                                </td>
                                <td style="text-transform: uppercase">{{ $item->sku }}</td>
                                <td>
                                    @if ($item->category_id)
                                        {{ $item->category->name }}
                                    @else
                                        Uncategorized
                                    @endif
                                </td>
                                {{-- <td>Brand</td> --}}
                                <td>Ksh {{ $item->price }}</td>
                                {{-- <td>{{$item->unit}}</td> --}}
                                {{-- <td>100</td> --}}
                                <td>
                                    <div class="userimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{ $item->user->profile_photo_url }}" />
                                        </a>
                                        <a href="javascript:void(0);">{{ $item->user->name }}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
