<div class="page-wrapper">
    @section('title')
    Dashboard
    @endsection
    <div class="content">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('assets/img/icons/dash1.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>Ksh <span class="counters" data-count="307144.00">Ksh 307,144.00</span></h5>
                        <h6>Total Purchase Due</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash1 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('assets/img/icons/dash2.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>Ksh <span class="counters" data-count="4385.00">Ksh 4,385.00</span></h5>
                        <h6>Total Sales Due</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash2 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('assets/img/icons/dash3.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>Ksh <span class="counters" data-count="385656.50">Ksh 385,656.50</span></h5>
                        <h6>Total Sale Amount</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-widget dash3 w-100">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('assets/img/icons/dash4.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>Ksh <span class="counters" data-count="40000.00">Ksh 400.00</span></h5>
                        <h6>Total Expense Amount</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{$countClients}}</h4>
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
                        <h4>{{$activeClients}}</h4>
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
                        <h4>150</h4>
                        <h5>Purchase Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <img src="{{asset('assets/img/icons/file-text-icon-01.svg')}}" class="img-fluid" alt="icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>170</h4>
                        <h5>Sales Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Clients History</h5>
                        <div class="graph-sets">
                            <ul class="mb-0">
                                <li>
                                    <span>Clients</span>
                                </li>
                                <li>
                                    <span>Earnings</span>
                                </li>
                            </ul>
                            <div class="dropdown dropdown-wraper">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2023
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales_charts"></div>
                    </div>
                </div> 
            </div>
            <div class="col-xl-6 col-sm-12 col-12 d-flex">
                <div class="card flex-fill default-cover mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Recent Transactions</h4>
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
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="productimgname">
                                            <a href="product-list.html" class="product-img">
                                                <img src="{{asset('assets/img/products/stock-img-01.png')}}"
                                                    alt="product">
                                            </a>
                                            <a href="product-list.html">Lenevo 3rd Generation</a>
                                        </td>
                                        <td>Ksh 12500</td>
                                        <td>29 Mar 2023</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="productimgname">
                                            <a href="product-list.html" class="product-img">
                                                <img src="{{asset('assets/img/products/stock-img-06.png')}}"
                                                    alt="product">
                                            </a>
                                            <a href="product-list.html">Bold V3.2</a>
                                        </td>
                                        <td>Ksh 1600</td>
                                        <td>29 Mar 2023</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="productimgname">
                                            <a href="product-list.html" class="product-img">
                                                <img src="{{asset('assets/img/products/stock-img-02.png')}}"
                                                    alt="product">
                                            </a>
                                            <a href="product-list.html">Nike Jordan</a>
                                        </td>
                                        <td>Ksh 2000</td>
                                        <td>29 Mar 2023</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="productimgname">
                                            <a href="product-list.html" class="product-img">
                                                <img src="{{asset('assets/img/products/stock-img-03.png')}}"
                                                    alt="product">
                                            </a>
                                            <a href="product-list.html">Apple Series 5 Watch</a>
                                        </td>
                                        <td>Ksh 800</td>
                                        <td>29 Mar 2023</td>
                                    </tr>
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
                    <a href="{{route('admin.clients')}}" class="btn btn-primary"><i data-feather="menu"
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
                                            <img src="{{asset('assets/img/clients')}}/{{$item->logo}}" alt="Logo">
                                            @else
                                            <img src="{{$item->contactPerson->profile_photo_url}}" alt="Logo">
                                            @endif

                                        </a>
                                        <a href="javascript:void(0);">{{$item->name}} </a>
                                    </div>
                                </td>
                                <td style="text-transform: uppercase"><a
                                        href="javascript:void(0);"><b>{{$item->reference}}</b></a></td>
                                <td>{{(date('d M Y',strtotime($item->created_at)))}}</td>
                                <td>Ksh {{$item->renewal_fee}}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 p-2" href="#">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class=" confirm-text p-2" href="javascript:void(0);">
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
