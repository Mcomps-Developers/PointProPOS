<div>
    @section('title')
        Invoices
    @endsection
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header" wire:ignore>
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Invoices</h4>
                        <h6>Manage Your Invoices</h6>
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
                <div class="page-btn">
                    <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                            data-feather="plus-circle" class="me-2"></i>Add New
                        Invoice</a>
                </div>
            </div>

            <div class="card table-list-card"wire:ignore>
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
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

                    {{-- <div class="card" id="filter_inputs">
                        <div class="pb-0 card-body">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="box" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose product</option>
                                            <option>Bold V3.2</option>
                                            <option>Apple Series 5 Watch</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="stop-circle" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Sent</option>
                                            <option>Ordered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="user" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Custmer</option>
                                            <option>walk-in-customer</option>
                                            <option>John Smith</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="file-text" class="info-img"></i>
                                        <div class="input-groupicon">
                                            <input type="text" class="form-control" placeholder="Enter Reference" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <a class="btn btn-filters ms-auto">
                                            <i data-feather="search" class="feather-search"></i>
                                            Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all" />
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    {{-- <th>Product Name</th> --}}
                                    <th>Reference</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Grand Total (KES)</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $item)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox" />
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td style="text-transform: uppercase"><a
                                                href="{{ route('invoice.details', ['reference' => $item->reference]) }}"><span
                                                    class="badges status-badge">INV-{{ $item->reference }}PP</span></a>
                                        </td>
                                        {{-- <td class="productimgname">
                                        <div class="view-product me-2">
                                            <a href="javascript:void(0);">
                                                <img src="assets/img/products/stock-img-01.png"  />
                                            </a>
                                        </div>
                                        <a href="javascript:void(0);">Lenovo 3rd Generation</a>
                                    </td> --}}
                                        <td>{{ $item->customer->name }}</td>
                                        <td style="text-transform: capitalize;">
                                            @if ($item->status === 'progress')
                                                <span class="text-primary">{{ $item->status }}</span>
                                            @elseif ($item->status === 'complete')
                                                <span class="text-success">{{ $item->status }}</span>
                                            @elseif ($item->status === 'cancelled')
                                                <span class="text-danger">{{ $item->status }}</span>
                                            @elseif ($item->status === 'defaulted')
                                                <span class="text-warning">{{ $item->status }}</span>
                                            @elseif ($item->status === 'pending')
                                                <span class="text-info">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>KES {{ $item->amount }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action data-row">
                                                <a class="p-2 mb-0 me-2"
                                                    href="{{ route('invoice.details', ['reference' => $item->reference]) }}">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="p-2 mb-0 me-2" data-bs-toggle="modal"
                                                    data-bs-target="#edit-units">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="p-2 mb-0 me-2 confirm-text" href="javascript:void(0);">
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
    <div class="modal fade" id="add-units" wire:ignore.self>
        <div class="modal-dialog purchase modal-dialog-centered stock-adjust-modal">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>New Invoice</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form wire:submit.prevent='validateInput'>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks add-product">
                                            <label>Customer Email</label>
                                            <div class="row">
                                                <div class="col-lg-10 col-sm-10 col-10">
                                                    <input type="email" name="" id=""
                                                        class="form-control" wire:model.live='email'
                                                        wire:blur='CheckUser'>
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    @if ($name)
                                                        <p class="text-success"><strong>Name:
                                                            </strong>{{ $name }} <strong><br> Phone:
                                                            </strong>+{{ $phone_number }}<br>
                                                            <strong class="text-danger"><span>Unpaid Debts: </span>
                                                                {{ $debtBalance }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="p-0 col-lg-2 col-sm-2 col-2">
                                                    <div class="add-icon tab">
                                                        <a class="btn btn-filter" href="{{ route('customers') }}"><i
                                                                class="fa fa-plus text-danger"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks">
                                            <label>Fisrt Day of Repayment</label>
                                            <div class="input-groupicon calender-input">
                                                <input type="date" class="form-control" placeholder="Choose"
                                                    wire:model.live='first_repayment_date' />
                                                @error('first_repayment_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks">
                                            <label>Repayment frequency</label>
                                            <select name="" id="" class="form-control"
                                                wire:model.live='repayment_frequency'>
                                                <option>-:-</option>
                                                <option value="daily">Daily</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                            </select>
                                            @error('repayment_frequency')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        @if ($repayment_frequency)
                                            <div class="input-blocks">
                                                <label>
                                                    Repayable in how many
                                                    @if ($repayment_frequency == 'daily')
                                                        days
                                                    @elseif ($repayment_frequency == 'weekly')
                                                        weeks
                                                    @elseif ($repayment_frequency == 'months')
                                                        months
                                                    @endif
                                                </label>
                                                <input type="number" name="" id=""
                                                    class="form-control" wire:model.live='duration'>
                                                @error('duration')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-blocks">
                                            <label>Product Name</label>
                                            <div class="input-groupicon">
                                                <input type="text" class="form-control"
                                                    placeholder="Please type product code and select"
                                                    wire:model.live="productName">
                                            </div>
                                            @if (!empty($productName))
                                                <ul class="mt-2 list-group">
                                                    @foreach ($products as $product)
                                                        <li class="list-group-item"
                                                            wire:click="addToCart({{ $product->id }})">
                                                            {{ $product->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-blocks">
                                            <label>Qty</label>
                                            <input type="number" name="" id="" class="form-control"
                                                wire:model.live='quantity'>
                                            @error('quantity')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-blocks">
                                            <label>Invoice Type</label>
                                            <select name="" id="" class="form-control"
                                                wire:model.live='loanType'>
                                                <option>-:-</option>
                                                <option value="pay_later">Collect Pay later</option>
                                                <option value="collect_later">Pay collect later</option>
                                            </select>
                                            @error('loanType')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="modal-body-table">
                                            <div class="table-responsive">
                                                <table class="table datanew">
                                                    <thead>
                                                        <tr>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Subtotal</th>
                                                            <th></th>
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (Cart::instance('cart')->content() as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="productimgname">
                                                                        <a href="javascript:void(0);"
                                                                            class="product-img stock-img">
                                                                            <img
                                                                                src="{{ asset('assets/img/products') }}/{{ $item->model->image }}" />
                                                                        </a>
                                                                        <a
                                                                            href="javascript:void(0);">{{ $item->model->name }}</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="quantity-control d-flex align-items-center">
                                                                        <a class="btn btn-outline-secondary btn-sm"
                                                                            wire:click="increaseQuantity('{{ $item->rowId }}')">
                                                                            <i class="fa fa-plus"></i>
                                                                        </a>
                                                                        <input type="text"
                                                                            class="mx-2 text-center form-control"
                                                                            value="{{ $item->qty }}" disabled />
                                                                        <a class="btn btn-outline-secondary btn-sm"
                                                                            wire:click="decreaseQuantity('{{ $item->rowId }}')">
                                                                            <i class="fa fa-minus"></i>
                                                                        </a>
                                                                    </div>
                                                                    <style>
                                                                        .quantity-control .btn {
                                                                            width: 32px;
                                                                            height: 32px;
                                                                            padding: 0;
                                                                            display: flex;
                                                                            align-items: center;
                                                                            justify-content: center;
                                                                        }

                                                                        .quantity-control .form-control {
                                                                            width: 60px;
                                                                            max-width: 60px;
                                                                            padding: 0.375rem 0.75rem;
                                                                        }
                                                                    </style>
                                                                </td>
                                                                <td>{{ $item->model->price }}</td>
                                                                <td>{{ $item->subtotal }}</td>
                                                                <td>
                                                                    <div
                                                                        class="quantity-control d-flex align-items-center">
                                                                        <a class="btn btn-outline-danger btn-sm"
                                                                            wire:click="destroy('{{ $item->rowId }}')">
                                                                            <i class="fa fa-trash"></i>
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
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Order Tax</label>
                                                <input type="text" value="{{ Cart::instance('cart')->tax }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Discount (KES)</label>
                                                <input type="number" value="{{ $discount }}"
                                                    wire:model.live='discount' class="form-control" />
                                                @error('discount')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Shipping</label>
                                                <input type="number" value="{{ $shipping_fee }}"
                                                    wire:model.live='shipping_fee' class="form-control" />
                                                @error('shipping_fee')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Status</label>
                                                <select class="form-control" wire:model.live='status'>
                                                    <option>-:-</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="complete">Complete</option>
                                                    <option value="progress">In Progress</option>
                                                    <option value="defaulted">Defaulted</option>
                                                </select>
                                                @error('status')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12">
                                    <div class="input-blocks summer-description-box">
                                        <label>Notes</label>
                                        <textarea name="" id="" cols="30" rows="10" class="form-control">
                                            Additional notes....
                                        </textarea>
                                    </div>
                                </div> --}}
                                <div class="modal-footer-btn">
                                    <div class="text-left" style="margin-bottom: 16px;">
                                        <a class="btn btn-info">Subtotal: KES
                                            {{ Cart::instance('cart')->subtotal }}
                                        </a>
                                        @php
                                            // Example formatted total with commas
                                            $formattedTotal = Cart::instance('cart')->total(); // Assuming this returns '5,876.00'

                                            // Remove commas and convert to float
                                            $totalFloat = (float) str_replace(',', '', $formattedTotal);

                                            // Example additional variables for operations
                                            $shipping_fee = $this->shipping_fee; // Example shipping fee
                                            $discount = $this->discount; // Example discount

                                            // Perform arithmetic operations
                                            $totalAfterOperations = $totalFloat + $shipping_fee - $discount;

                                            // Format result with number_format() for display
                                            $formattedResult = number_format($totalAfterOperations, 2);
                                        @endphp

                                        <a class="btn btn-success">Total: KES
                                            {{ $formattedResult }}
                                        </a>
                                    </div>

                                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-submit" wire:target="validateInput"
                                        wire:loading.remove>Process Loan</button>
                                    <button class="btn btn-warning-light" type="button" disabled
                                        wire:target="validateInput" wire:loading>
                                        <span class="align-middle spinner-grow spinner-grow-sm" role="status"
                                            aria-hidden="true"></span>
                                        Processing...
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="edit-units">
        <div class="modal-dialog edit-sales-modal">
            <div class="modal-content">
                <div class="p-0 m-0 page-wrapper">
                    <div class="p-0 content">
                        <div class="p-4 mb-0 page-header">
                            <div class="add-item new-sale-items d-flex">
                                <div class="page-title">
                                    <h4>Edit Quotation</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="quotationList.html">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Customer Name</label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-sm-10 col-10">
                                                        <select class="select">
                                                            <option>Thomas</option>
                                                            <option>Rose</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                        <div class="add-icon">
                                                            <span class="choose-add"><i data-feather="plus-circle"
                                                                    class="plus"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Date</label>
                                                <div class="input-groupicon calender-input">
                                                    <i data-feather="calendar" class="info-img"></i>
                                                    <input type="text" class="datetimepicker"
                                                        placeholder="19 jan 2023" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Reference Number</label>
                                                <input type="text" placeholder="010203" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Product Name</label>
                                                <div class="input-groupicon select-code">
                                                    <input type="text"
                                                        placeholder="Please type product code and select" />
                                                    <div class="addonset">
                                                        <img src="assets/img/icons/scanners.svg" alt="img" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive no-pagination">
                                        <table class="table datanew">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Qty</th>
                                                    <th>Purchase Price($)</th>
                                                    <th>Discount($)</th>
                                                    <th>Tax(%)</th>
                                                    <th>Tax Amount($)</th>
                                                    <th>Unit Cost($)</th>
                                                    <th>Total Cost(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                                <img src="assets/img/products/stock-img-02.png"
                                                                     />
                                                            </a>
                                                            <a href="javascript:void(0);">Nike Jordan</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="product-quantity">
                                                            <span class="quantity-btn">+<i data-feather="plus-circle"
                                                                    class="plus-circle"></i></span>
                                                            <input type="text" class="quntity-input" value="2" />
                                                            <span class="quantity-btn"><i data-feather="minus-circle"
                                                                    class="feather-search"></i></span>
                                                        </div>
                                                    </td>
                                                    <td>2000</td>
                                                    <td>500</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>1500</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                                <img src="assets/img/products/stock-img-03.png"
                                                                     />
                                                            </a>
                                                            <a href="javascript:void(0);">Apple Series 5 Watch</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="product-quantity">
                                                            <span class="quantity-btn">+<i data-feather="plus-circle"
                                                                    class="plus-circle"></i></span>
                                                            <input type="text" class="quntity-input" value="2" />
                                                            <span class="quantity-btn"><i data-feather="minus-circle"
                                                                    class="feather-search"></i></span>
                                                        </div>
                                                    </td>
                                                    <td>3000</td>
                                                    <td>400</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>1700</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                                <img src="assets/img/products/stock-img-05.png"
                                                                     />
                                                            </a>
                                                            <a href="javascript:void(0);">Lobar Handy</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="product-quantity">
                                                            <span class="quantity-btn">+<i data-feather="plus-circle"
                                                                    class="plus-circle"></i></span>
                                                            <input type="text" class="quntity-input" value="2" />
                                                            <span class="quantity-btn"><i data-feather="minus-circle"
                                                                    class="feather-search"></i></span>
                                                        </div>
                                                    </td>
                                                    <td>2500</td>
                                                    <td>500</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                    <td>2000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 ms-auto">
                                            <div class="m-auto mb-4 total-order w-100 max-widthauto">
                                                <ul>
                                                    <li>
                                                        <h4>Order Tax</h4>
                                                        <h5>$ 0.00</h5>
                                                    </li>
                                                    <li>
                                                        <h4>Discount</h4>
                                                        <h5>$ 0.00</h5>
                                                    </li>
                                                    <li>
                                                        <h4>Shipping</h4>
                                                        <h5>$ 0.00</h5>
                                                    </li>
                                                    <li>
                                                        <h4>Grand Total</h4>
                                                        <h5>$5200.00</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Order Tax</label>
                                                <div class="input-groupicon select-code">
                                                    <input type="text" placeholder="0" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Discount</label>
                                                <div class="input-groupicon select-code">
                                                    <input type="text" placeholder="0" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Shipping</label>
                                                <div class="input-groupicon select-code">
                                                    <input type="text" placeholder="0" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="mb-3 input-blocks">
                                                <label>Status</label>
                                                <select class="select">
                                                    <option>Sent</option>
                                                    <option>Completed</option>
                                                    <option>Inprogress</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-blocks summer-description-box">
                                                <label>Description</label>
                                                <div id="summernote5"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <button type="button" class="btn btn-cancel add-cancel me-3"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-submit add-sale">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
