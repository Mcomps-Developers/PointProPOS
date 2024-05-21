<div class="page-wrapper">
    @section('title')
    Manage Clients
    @endsection
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Clients</h4>
                    <h6>Manage Clients</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                            src="{{asset('assets/img/icons/pdf.svg')}}" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                            src="{{asset('assets/img/icons/excel.svg')}}" alt="img"></a>
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
                        data-feather="plus-circle" class="me-2"></i>Add New Client</a>
                <div class="modal fade" id="add-units">
                    <div class="modal-dialog modal-dialog-centered custom-modal-two">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="modal-body custom-modal-body">
                                        <form action="warehouse.html">
                                            <div class="modal-title-head">
                                                <h6><span><i data-feather="info" class="feather-edit"></i></span>Contact
                                                    Person</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" wire:model.live='name'>
                                                        @error('name')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            wire:model.live='email'>
                                                        @error('email')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 war-add">
                                                        <label class="mb-2">Phone Number</label>
                                                        <input class="form-control" id="phone" name="phone" type="tel"
                                                            wire:model.live='phone_number'>
                                                        @error('phone_number')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-title-head">
                                                    <h6><span><i data-feather="info"
                                                                class="feather-edit"></i></span>Company
                                                        Info</h6>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Business Name</label>
                                                        <input type="text" class="form-control"
                                                            wire:model.live='business_name'>
                                                        @error('business_name')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Business Email</label>
                                                        <input type="tel" class="form-control"
                                                            wire:model.live='business_email'>
                                                        @error('business_email')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Business Phone</label>
                                                        <input type="tel" class="form-control"
                                                            wire:model.live='business_phone_number'>
                                                        @error('business_phone_number')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">KRA PIN Number</label>
                                                        <input type="text" class="form-control"
                                                            wire:model.live='kra_pin_number'>
                                                        @error('kra_pin_number')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 war-add">
                                                        <label class="mb-2">Industry</label>
                                                        <select name="" id="" class="form-control"
                                                            wire:model.live='industry'>
                                                            <option>--</option>
                                                            @foreach ($collection as $item)
                                                            <option value="{{$item->id}}">{{$item->industry}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('industry')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control"
                                                            wire:model.live='address'>
                                                        @error('address')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer-btn">
                                                <button type="button" class="btn btn-cancel me-2"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-submit" wire:target="addIndustry"
                                                    wire:loading.remove>Create Client</button>
                                                <button class="btn btn-warning-light" type="button" disabled
                                                    wire:target="addIndustry" wire:loading>
                                                    <span class="spinner-grow spinner-grow-sm align-middle"
                                                        role="status" aria-hidden="true"></span>
                                                    Creating...
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                            </a>
                            <div class="layout-hide-box">
                                <a href="javascript:void(0);" class="me-3 layout-box"><i data-feather="layout"
                                        class="feather-search"></i></a>
                                <div class="layout-drop-item card">
                                    <div class="drop-item-head">
                                        <h5>Want to manage datatable?</h5>
                                        <p>Please drag and drop your column to reorder your table and enable see option
                                            as you want.</p>
                                    </div>
                                    <ul>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Shop</span>
                                                <input type="checkbox" id="option1" class="check" checked>
                                                <label for="option1" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Product</span>
                                                <input type="checkbox" id="option2" class="check" checked>
                                                <label for="option2" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Reference No</span>
                                                <input type="checkbox" id="option3" class="check" checked>
                                                <label for="option3" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Date</span>
                                                <input type="checkbox" id="option4" class="check" checked>
                                                <label for="option4" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Responsible Person</span>
                                                <input type="checkbox" id="option5" class="check" checked>
                                                <label for="option5" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Notes</span>
                                                <input type="checkbox" id="option6" class="check" checked>
                                                <label for="option6" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Quantity</span>
                                                <input type="checkbox" id="option7" class="check" checked>
                                                <label for="option7" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label"><i data-feather="menu"
                                                        class="feather-menu"></i>Actions</span>
                                                <input type="checkbox" id="option8" class="check" checked>
                                                <label for="option8" class="checktoggle"> </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-sort">
                        <i data-feather="sliders" class="info-img"></i>
                        <select class="select">
                            <option>Sort by Date</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="archive" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Clients</option>
                                        <option>Legendary</option>
                                        <option>Determined</option>
                                        <option>Sincere</option>
                                        <option>Pretty</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="user" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Person</option>
                                        <option>Steven</option>
                                        <option>Gravely</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <div class="input-groupicon">
                                        <input type="text" class="datetimepicker" placeholder="Created Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="user" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 ms-auto">
                                <div class="input-blocks">
                                    <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                            class="feather-search"></i> Search </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Clients</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Total Products</th>
                                <th>Stock</th>
                                <th>Qty</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    Legendary
                                </td>
                                <td>
                                    <div class="userimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{asset('assets/img/users/user-08.jpg')}}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Steven</a>
                                    </div>
                                </td>
                                <td>
                                    +1 45445 4454
                                </td>
                                <td>04</td>
                                <td>
                                    55
                                </td>
                                <td>600</td>
                                <td>04 Aug 2023</td>
                                <td><span class="badge badge-linesuccess">Active</span></td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="eye" class="feather-eye"></i>
                                        </a>
                                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="confirm-text p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    Determined
                                </td>
                                <td>
                                    <div class="userimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{asset('assets/img/users/user-04.jpg')}}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Gravely</a>
                                    </div>
                                </td>
                                <td>
                                    +1 63728 3467
                                </td>
                                <td>04</td>
                                <td>
                                    60
                                </td>
                                <td>300</td>
                                <td>18 Sep 2023</td>
                                <td><span class="badge badge-linesuccess">Active</span></td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="eye" class="feather-eye"></i>
                                        </a>
                                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="confirm-text p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    Sincere
                                </td>
                                <td>
                                    <div class="userimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{asset('assets/img/users/user-09.jpg')}}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Kevin</a>
                                    </div>
                                </td>
                                <td>
                                    +1 95628 1036
                                </td>
                                <td>04</td>
                                <td>
                                    26
                                </td>
                                <td>250</td>
                                <td>05 Oct 2023</td>
                                <td><span class="badge badge-linesuccess">Active</span></td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="eye" class="feather-eye"></i>
                                        </a>
                                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="confirm-text p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    Pretty
                                </td>
                                <td>
                                    <div class="userimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{asset('assets/img/users/user-10.jpg')}}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Grillo</a>
                                    </div>
                                </td>
                                <td>
                                    +1 65730 1603
                                </td>
                                <td>04</td>
                                <td>
                                    47
                                </td>
                                <td>400</td>
                                <td>21 Nov 2023</td>
                                <td><span class="badge badge-linesuccess">Active</span></td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="eye" class="feather-eye"></i>
                                        </a>
                                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-units">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="confirm-text p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
