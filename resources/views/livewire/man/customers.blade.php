<div>
    @section('title')
    Customers
    @endsection
    <div class="page-wrapper" wire:ignore>
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Customers</h4>
                        <h6>Manage your customers</h6>
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
                    <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                            data-feather="plus-circle" class="me-2"></i>Add New
                        Customer</a>
                </div>
            </div>

            <div class="card table-list-card">
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
                                    <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img" /></span>
                                </a>
                            </div>
                        </div>
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                {{-- <option>Newest</option>
                                <option>Oldest</option> --}}
                            </select>
                        </div>
                    </div>

                    {{-- <div class="card" id="filter_inputs">
                        <div class="pb-0 card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="user" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Customer Name</option>
                                            <option>Benjamin</option>
                                            <option>Ellen</option>
                                            <option>Freda</option>
                                            <option>Kaitlin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="globe" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Country</option>
                                            <option>India</option>
                                            <option>USA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 ms-auto">
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
                                    <th>Customer Name</th>
                                    {{-- <th>Code</th> --}}
                                    {{-- <th>Customer</th> --}}
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- <th>Country</th> --}}
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $item)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox" />
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="userimgname cust-imgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{$item->profile_photo_url}}" />
                                            </a>
                                            <a href="javascript:void(0);">{{$item->name}}</a>
                                        </div>
                                    </td>
                                    {{-- <td>201</td> --}}
                                    {{-- <td>Thomas</td> --}}
                                    <td>
                                        <a href="mailto:{{$item->email}}"><span>{{$item->email}}</span></a>
                                    </td>
                                    <td><a href="tel:+{{$item->phone_number}}">+{{$item->phone_number}}</a></td>
                                    {{-- <td>Germany</td> --}}
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="p-2 me-2" href="javascript:void(0);">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="p-2 me-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-units">
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
    {{-- Add Customer --}}
    <div class="modal fade" id="add-units" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add Customer</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form wire:submit.prevent='create'>
                                <div class="modal-title-head people-cust-avatar">
                                    <h6>Avatar</h6>
                                </div>
                                {{-- <div class="new-employee-field">
                                    <div class="profile-pic-upload">
                                        <div class="profile-pic">
                                            <span><i data-feather="plus-circle" class="plus-down-add"></i>
                                                Add Image</span>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-0 image-upload">
                                                <input type="file" />
                                                <div class="image-uploads">
                                                    <h4>Change Image</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-4 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" wire:model.live='name' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" wire:model.live='email' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                        <div class="input-blocks">
                                            <label class="mb-2">Phone</label>
                                            <input class="form-control form-control-lg group_formcontrol" id="phone"
                                                name="phone" type="text" wire:model.live='phone_number' />
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-6 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-6 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="select">
                                                <option>Choose</option>
                                                <option>United Kingdom</option>
                                                <option>United State</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-12">
                                        <div class="mb-3 input-blocks">
                                            <label class="form-label">Descriptions</label>
                                            <textarea class="mb-1 form-control"></textarea>
                                            <p>Maximum 60 Characters</p>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit" wire:target="create"
                                        wire:loading.remove>Create Customer</button>
                                    <button class="btn btn-warning-light" type="button" disabled wire:target="create"
                                        wire:loading>
                                        <span class="align-middle spinner-grow spinner-grow-sm" role="status"
                                            aria-hidden="true"></span>
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

    {{-- <div class="modal fade" id="edit-units">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Edit Customer</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="customers.html">
                                <div class="modal-title-head people-cust-avatar">
                                    <h6>Avatar</h6>
                                </div>
                                <div class="new-employee-field">
                                    <div class="profile-pic-upload">
                                        <div class="profile-pic people-profile-pic">
                                            <img src="assets/img/profiles/profile.png" alt="Img" />
                                            <a href="#"><i data-feather="x-square" class="x-square-add"></i></a>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-0 image-upload">
                                                <input type="file" />
                                                <div class="image-uploads">
                                                    <h4>Change Image</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" value="Thomas" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="thomas@example.com" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                        <div class="input-blocks">
                                            <label class="mb-2">Phone</label>
                                            <input class="form-control form-control-lg group_formcontrol" id="phone2"
                                                name="phone2" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control"
                                                value="Budapester Strasse 2027259 " />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <select class="select">
                                                <option>Varrel</option>
                                                <option>Varrel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pe-0">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="select">
                                                <option>Germany</option>
                                                <option>United State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0 input-blocks">
                                            <label class="form-label">Descriptions</label>
                                            <textarea class="mb-1 form-control"></textarea>
                                            <p>Maximum 60 Characters</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-submit">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
