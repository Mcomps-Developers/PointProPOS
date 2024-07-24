<div>
    @section('title')
    Products
    @endsection
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Products</h4>
                        <h6>Manage your products</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                src="{{asset('assets/img/icons/pdf.svg')}}" alt="img" /></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                                src="{{asset('assets/img/icons/excel.svg')}}" alt="img" /></a>
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
                    <a href="{{route('product.add')}}" class="btn btn-added"><i data-feather="plus-circle"
                            class="me-2"></i>Add
                        New
                        Product</a>
                </div>
                <div class="page-btn import">
                    <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                            data-feather="download" class="me-2"></i>Import Product</a>
                </div>
            </div>

            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img" /></span>
                            </a>
                        </div>
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                {{-- <option>14 09 23</option>
                                <option>11 09 23</option> --}}
                            </select>
                        </div>
                    </div>

                    <div class="mb-0 card" id="filter_inputs">
                        <div class="pb-0 card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="box" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    {{-- <option>Lenovo 3rd Generation</option>
                                                    <option>Nike Jordan</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Category</option>
                                                    {{-- <option>Laptop</option>
                                                    <option>Shoe</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="git-merge" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    {{-- <option>Computers</option>
                                                    <option>Fruits</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>All Brand</option>
                                                    {{-- <option>Lenovo</option>
                                                    <option>Nike</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i class="fas fa-money-bill info-img"></i>
                                                <select class="select">
                                                    <option>Price</option>
                                                    {{-- <option>$12500.00</option>
                                                    <option>$12500.00</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
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
                        </div>
                    </div>

                    <div class="table-responsive product-list">
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
                                    <th class="no-sort">Action</th>
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
                                                <img src="{{asset('assets/img/products')}}/{{$item->image}}" />
                                            </a>
                                            <a href="javascript:void(0);">{{$item->name}}
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$item->sku}}</td>
                                    <td>
                                        @if ($item->category_id)
                                        {{$item->category->name}}
                                        @else
                                        Uncategorized
                                        @endif
                                    </td>
                                    {{-- <td>Brand</td> --}}
                                    <td>Ksh {{$item->price}}</td>
                                    {{-- <td>{{$item->unit}}</td> --}}
                                    {{-- <td>100</td> --}}
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{$item->user->profile_photo_url}}" />
                                            </a>
                                            <a href="javascript:void(0);">{{$item->user->name}}</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="p-2 me-2 edit-icon" href="javascript:void(0);">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="p-2 me-2" href="javascript:void(0);">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="p-2" href="javascript:void(0);"
                                                wire:confirm='Are you sure you want to delete?'
                                                wire:click.prevent='delete({{$item->id}})'>
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
</div>
