<div>
    @section('title')
    New Product
    @endsection
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>New Product</h4>
                        <h6>Create new product</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <div class="page-btn">
                            <a href="{{route('products')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                                    class="me-2"></i>Back to Product</a>
                        </div>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <form wire:submit.prevent='create'>
                <div class="card">
                    <div class="pb-0 card-body add-product">
                        <div class="accordion-card-one accordion" id="accordionExample">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <div class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-controls="collapseOne">
                                        <div class="addproduct-icon">
                                            <h5>
                                                <i data-feather="info" class="add-info"></i><span>Product
                                                    Information</span>
                                            </h5>
                                            <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                    class="chevron-down-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{-- <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Store</label>
                                                    <select class="select">
                                                        <option>Choose</option>
                                                        <option>Thomas</option>
                                                        <option>Rasmussen</option>
                                                        <option>Fred john</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Warehouse</label>
                                                    <select class="select">
                                                        <option>Choose</option>
                                                        <option>Legendary</option>
                                                        <option>Determined</option>
                                                        <option>Sincere</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" wire:model.live='name' />
                                                    @error('name')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="input-blocks add-product list">
                                                    <label>SKU</label>
                                                    <input type="text" class="form-control list"
                                                        placeholder="Enter SKU" />
                                                    <button type="submit" class="btn btn-primaryadd">
                                                        Generate Code
                                                    </button>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="addservice-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12">
                                                    <div class="mb-3 add-product">
                                                        <div class="add-newplus">
                                                            <label class="form-label">Category</label>
                                                            {{-- <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-units-category"><i
                                                                    data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add New</span></a>
                                                            --}}
                                                        </div>
                                                        <select class="select" wire:model.live='category'>
                                                            <option>Choose</option>
                                                            @foreach ($categories as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Sub Category</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Lenovo</option>
                                                            <option>Electronics</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Sub Sub Category</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Fruits</option>
                                                            <option>Computers</option>
                                                            <option>Shoes</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="add-product-new">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <div class="add-newplus">
                                                            <label class="form-label">Brand</label>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-units-brand"><i
                                                                    data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add New</span></a>
                                                        </div>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Nike</option>
                                                            <option>Bolt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <div class="add-newplus">
                                                            <label class="form-label">Unit</label>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-unit"><i data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add New</span></a>
                                                        </div>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Kg</option>
                                                            <option>Pc</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Selling Type</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Transactional selling</option>
                                                            <option>Solution selling</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Barcode Symbology</label>
                                                    <select class="select">
                                                        <option>Choose</option>
                                                        <option>Code34</option>
                                                        <option>Code35</option>
                                                        <option>Code36</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-12">
                                                <div class="input-blocks add-product list">
                                                    <label>Item Code</label>
                                                    <input type="text" class="form-control list"
                                                        placeholder="Please Enter Item Code" />
                                                    <button type="submit" class="btn btn-primaryadd">
                                                        Generate Code
                                                    </button>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-lg-12">
                                            <div class="mb-3 input-blocks summer-description-box transfer">
                                                <label>Description</label>
                                                <textarea class="form-control h-100" rows="5"></textarea>
                                                <p class="mt-1">Maximum 60 Characters</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card-one accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <div class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-controls="collapseTwo">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list icon">
                                                <h5>
                                                    <i data-feather="life-buoy" class="add-info"></i>
                                                    <span>
                                                        {{-- Pricing & Stocks --}}
                                                        Pricing
                                                    </span>
                                                </h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        {{-- <div class="input-blocks add-products">
                                            <label class="d-block">Product Type</label>
                                            <div class="single-pill-product">
                                                <ul class="nav nav-pills" id="pills-tab1" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <span class="mb-0 custom_radio me-4 active" id="pills-home-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-home"
                                                            role="tab" aria-controls="pills-home" aria-selected="true">
                                                            <input type="radio" class="form-control" name="payment" />
                                                            <span class="checkmark"></span> Single
                                                            Product</span>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <span class="mb-0 custom_radio me-2" id="pills-profile-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                            role="tab" aria-controls="pills-profile"
                                                            aria-selected="false">
                                                            <input type="radio" class="form-control" name="sign" />
                                                            <span class="checkmark"></span> Variable
                                                            Product</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    {{-- <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-12 col-sm-12 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Price</label>
                                                            <input type="number" class="form-control"
                                                                wire:model.live='price' />
                                                            @error('price')
                                                            <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Tax Type</label>
                                                            <select class="select">
                                                                <option>Exclusive</option>
                                                                <option>Sales Tax</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Discount Type</label>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Percentage</option>
                                                                <option>Cash</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Discount Value</label>
                                                            <input type="text" placeholder="Choose" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity Alert</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="accordion-card-one accordion" id="accordionExample3">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="headingThree">
                                                            <div class="accordion-button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapseThree"
                                                                aria-controls="collapseThree">
                                                                <div class="addproduct-icon list">
                                                                    <h5>
                                                                        <i data-feather="image"
                                                                            class="add-info"></i><span>Image</span>
                                                                    </h5>
                                                                    <a href="javascript:void(0);"><i
                                                                            data-feather="chevron-down"
                                                                            class="chevron-down-add"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample3">
                                                            <div class="accordion-body">
                                                                <div class="text-editor add-list add">
                                                                    <div class="col-lg-12">
                                                                        <div class="add-choosen">
                                                                            <div class="input-blocks">
                                                                                <div class="image-upload">
                                                                                    <input type="file"
                                                                                        wire:model.live='image' />
                                                                                    <div class="image-uploads">
                                                                                        <i data-feather="plus-circle"
                                                                                            class="plus-down-add me-0"></i>
                                                                                        <h4>
                                                                                            <span wire:target='image'
                                                                                                wire:loading>Uploading</span>
                                                                                            <span wire:target='image'
                                                                                                wire:loading.remove>Add
                                                                                                Image</span>
                                                                                        </h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @if ($image)
                                                                            <div class="phone-img">
                                                                                <img src="{{$image->temporaryUrl()}}" />
                                                                                {{-- <a href="javascript:void(0);"><i
                                                                                        data-feather="x"
                                                                                        class="x-square-add remove-product"></i></a>
                                                                                --}}
                                                                            </div>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                {{-- <div class="row select-color-add">
                                                    <div class="col-lg-6 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Variant Attribute</label>
                                                            <div class="row">
                                                                <div class="col-lg-10 col-sm-10 col-10">
                                                                    <select
                                                                        class="form-control variant-select select-option"
                                                                        id="colorSelect">
                                                                        <option>Choose</option>
                                                                        <option>Color</option>
                                                                        <option value="red">Red</option>
                                                                        <option value="black">Black</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                                    <div class="add-icon tab">
                                                                        <a class="btn btn-filter" data-bs-toggle="modal"
                                                                            data-bs-target="#add-units"><i
                                                                                class="feather feather-plus-circle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="selected-hide-color" id="input-show">
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-10">
                                                                    <div class="input-blocks">
                                                                        <input class="input-tags form-control"
                                                                            id="inputBox" type="text"
                                                                            data-role="tagsinput" name="specialist"
                                                                            value="red, black" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="input-blocks">
                                                                        <a href="javascript:void(0);"
                                                                            class="remove-color"><i
                                                                                class="far fa-trash-alt"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="modal-body-table variant-table" id="variant-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Variantion</th>
                                                                    <th>Variant Value</th>
                                                                    <th>SKU</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th class="no-sort">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="color" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="red" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="1234" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="product-quantity">
                                                                            <span class="quantity-btn"><i
                                                                                    data-feather="minus-circle"
                                                                                    class="feather-search"></i></span>
                                                                            <input type="text" class="quntity-input"
                                                                                value="2" />
                                                                            <span class="quantity-btn">+<i
                                                                                    data-feather="plus-circle"
                                                                                    class="plus-circle"></i></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="50000" />
                                                                        </div>
                                                                    </td>
                                                                    <td class="action-table-data">
                                                                        <div class="edit-delete-action">
                                                                            <div class="input-block add-lists">
                                                                                <label class="checkboxs">
                                                                                    <input type="checkbox" checked />
                                                                                    <span class="checkmarks"></span>
                                                                                </label>
                                                                            </div>
                                                                            <a class="p-2 me-2"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#add-variation">
                                                                                <i data-feather="plus"
                                                                                    class="feather-edit"></i>
                                                                            </a>
                                                                            <a class="p-2 confirm-text"
                                                                                href="javascript:void(0);">
                                                                                <i data-feather="trash-2"
                                                                                    class="feather-trash-2"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="color" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="black" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="2345" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="product-quantity">
                                                                            <span class="quantity-btn"><i
                                                                                    data-feather="minus-circle"
                                                                                    class="feather-search"></i></span>
                                                                            <input type="text" class="quntity-input"
                                                                                value="3" />
                                                                            <span class="quantity-btn">+<i
                                                                                    data-feather="plus-circle"
                                                                                    class="plus-circle"></i></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="50000" />
                                                                        </div>
                                                                    </td>
                                                                    <td class="action-table-data">
                                                                        <div class="edit-delete-action">
                                                                            <div class="input-block add-lists">
                                                                                <label class="checkboxs">
                                                                                    <input type="checkbox" checked />
                                                                                    <span class="checkmarks"></span>
                                                                                </label>
                                                                            </div>
                                                                            <a class="p-2 me-2" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit-units">
                                                                                <i data-feather="plus"
                                                                                    class="feather-edit"></i>
                                                                            </a>
                                                                            <a class="p-2 confirm-text"
                                                                                href="javascript:void(0);">
                                                                                <i data-feather="trash-2"
                                                                                    class="feather-trash-2"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="accordion-card-one accordion" id="accordionExample4">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingFour">
                                    <div class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-controls="collapseFour">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list">
                                                <h5>
                                                    <i data-feather="list" class="add-info"></i><span>Custom
                                                        Fields</span>
                                                </h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <div class="text-editor add-list add">
                                            <div class="custom-filed">
                                                <div class="input-block add-lists">
                                                    <label class="checkboxs">
                                                        <input type="checkbox" />
                                                        <span class="checkmarks"></span>Warranties
                                                    </label>
                                                    <label class="checkboxs">
                                                        <input type="checkbox" />
                                                        <span class="checkmarks"></span>Manufacturer
                                                    </label>
                                                    <label class="checkboxs">
                                                        <input type="checkbox" />
                                                        <span class="checkmarks"></span>Expiry
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks add-product">
                                                        <label>Discount Type</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Percentage</option>
                                                            <option>Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks add-product">
                                                        <label>Quantity Alert</label>
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks">
                                                        <label>Manufactured Date</label>
                                                        <div class="input-groupicon calender-input">
                                                            <i data-feather="calendar" class="info-img"></i>
                                                            <input type="text" class="datetimepicker"
                                                                placeholder="Choose Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks">
                                                        <label>Expiry On</label>
                                                        <div class="input-groupicon calender-input">
                                                            <i data-feather="calendar" class="info-img"></i>
                                                            <input type="text" class="datetimepicker"
                                                                placeholder="Choose Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-4 btn-addproduct">
                        <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-submit" wire:target="create" wire:loading.remove>Create
                            Product</button>
                        <button class="btn btn-warning-light" type="button" disabled wire:target="create" wire:loading>
                            <span class="align-middle spinner-grow spinner-grow-sm" role="status"
                                aria-hidden="true"></span>
                            Creating...
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="modal fade" id="add-units">
        <div class="modal-dialog modal-dialog-centered stock-adjust-modal">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add Variation Attribute</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Attribute Name</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Add Value</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="nav user-menu">
                                        <li class="nav-item nav-searchinputs">
                                            <div class="top-nav-search">
                                                <form action="#" class="dropdown">
                                                    <div class="searchinputs list dropdown-toggle"
                                                        id="dropdownMenuClickable2" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="false">
                                                        <input type="text" placeholder="Search" />
                                                        <i data-feather="search" class="feather-16 icon"></i>
                                                        <div class="search-addon d-none">
                                                            <span><i data-feather="x-circle"
                                                                    class="feather-14"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu search-dropdown idea"
                                                        aria-labelledby="dropdownMenuClickable2">
                                                        <div class="search-info">
                                                            <p>Black</p>
                                                            <p>Red</p>
                                                            <p>Green</p>
                                                            <p>S</p>
                                                            <p>M</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-footer-btn popup">
                                        <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                            data-bs-dismiss="modal">Cancel</a>
                                        <a href="javascript:void(0);" class="btn btn-submit"
                                            data-bs-dismiss="modal">Create Attribute</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-units-category">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add New Category</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="add-product.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-units-brand">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add New Brand</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="add-product.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-unit">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add Unit</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="add-product.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-variation">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="p-0 page-wrapper-new">
                    <div class="content">
                        <div class="border-0 modal-header custom-modal-header">
                            <div class="page-title">
                                <h4>Add Variation</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="modal-title-head people-cust-avatar">
                                <h6>Variant Thumbnail</h6>
                            </div>
                            <div class="new-employee-field">
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
                            </div>
                            <div class="row">
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Barcode Symbology</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Code34</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <div class="input-blocks add-product list">
                                            <label>Item Code</label>
                                            <input type="text" class="form-control list" value="455454478844" />
                                            <button type="submit" class="btn btn-primaryadd">
                                                Generate Code
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks image-upload-down">
                                        <div class="image-upload download">
                                            <input type="file" />
                                            <div class="image-uploads">
                                                <img src="assets/img/download-img.png" alt="img" />
                                                <h4>Drag and drop a <span>file to upload</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-body">
                                        <div class="text-editor add-list add">
                                            <div class="col-lg-12">
                                                <div class="mb-3 add-choosen">
                                                    <div class="phone-img ms-0">
                                                        <img src="assets/img/products/phone-add-2.png" alt="image" />
                                                        <a href="javascript:void(0);"><i data-feather="x"
                                                                class="x-square-add remove-product"></i></a>
                                                    </div>
                                                    <div class="phone-img">
                                                        <img src="assets/img/products/phone-add-1.png" alt="image" />
                                                        <a href="javascript:void(0);"><i data-feather="x"
                                                                class="x-square-add remove-product"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity Alert</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Tax Type</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Direct</option>
                                            <option>Indirect</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Tax </label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Income Tax</option>
                                            <option>Service Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Discount Type </label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Percentage</option>
                                            <option>Early Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-0">
                                    <div>
                                        <label class="form-label">Discount Value</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="add-product.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
