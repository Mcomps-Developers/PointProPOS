<div class="page-wrapper">
    @section('title')
        Admin Dashboard
    @endsection
    <div class="content">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="dash-widget w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash1.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters"
                                data-count="{{ $transactions->where('state', 'COMPLETE')->sum('convenience_fee') - $transactions->where('state', 'COMPLETE')->sum('charges') }}">KES
                                {{ number_format($transactions->where('state', 'COMPLETE')->sum('convenience_fee') - $transactions->where('state', 'COMPLETE')->sum('charges'), 2) }}</span>
                        </h5>
                        <h6>Earning</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash2 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash3.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters"
                                data-count="{{ $transactions->where('state', 'COMPLETE')->sum('convenience_fee') }}">KES
                                {{ number_format($transactions->where('state', 'COMPLETE')->sum('convenience_fee'), 2) }}</span>
                        </h5>
                        <h6>Revenue</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash3 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('assets/img/icons/dash4.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>KES <span class="counters"
                                data-count="{{ $transactions->where('state', 'COMPLETE')->sum('charges') }}">KES
                                {{ number_format($transactions->where('state', 'COMPLETE')->sum('charges'), 2) }}</span>
                        </h5>
                        <h6>Expenses</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $countClients }}</h4>
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
                        <h4>{{ $activeClients }}</h4>
                        <h5>Active Customers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $transactions->count() }}</h4>
                        <h5>All Transactions</h5>
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
                        <h4>{{ $transactions->where('state', 'COMPLETE')->count() }}</h4>
                        <h5>Successful Transactions</h5>
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
                                                <td>KES 0</td>
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Recent Clients</h4>
                <div class="page-btn">
                    <a href="{{ route('admin.clients') }}" class="btn btn-primary"><i data-feather="menu"
                            class="me-2"></i>All Clients</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataview">
                    <table class="table dashboard-expired-products">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Client</th>
                                <th>Code</th>
                                <th>Join Date</th>
                                <th>Renewal Fee</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                @if ($item->logo)
                                                    <img src="{{ asset('assets/img/clients') }}/{{ $item->logo }}"
                                                        alt="Logo">
                                                @else
                                                    <img src="{{ $item->contactPerson->profile_photo_url }}"
                                                        alt="Logo">
                                                @endif

                                            </a>
                                            <a href="javascript:void(0);">{{ $item->name }} </a>
                                        </div>
                                    </td>
                                    <td style="text-transform: uppercase"><a
                                            href="javascript:void(0);"><b>{{ $item->reference }}</b></a></td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td>Ksh {{ $item->renewal_fee }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="p-2 me-2" href="#">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="p-2 confirm-text" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
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
</div>
