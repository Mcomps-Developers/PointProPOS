<div class="page-wrapper">
    @section('title')
    Company Settings
    @endsection
    <div class="content settings-content">
        <div class="page-header settings-pg-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Settings</h4>
                    <h6>Manage your settings on portal</h6>
                </div>
            </div>
            <ul class="table-top-head">
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
        <div class="row">
            <div class="col-xl-12">
                <div class="settings-wrapper d-flex">
                    <div class="sidebars settings-sidebar theiaStickySidebar" id="sidebar2">
                        <div class="sidebar-inner slimscroll">
                            <div id="sidebar-menu5" class="sidebar-menu">
                                <ul>
                                    <li class="submenu-open">
                                        <ul>
                                            <li class="submenu">
                                                <a href="javascript:void(0);"><i
                                                        data-feather="settings"></i><span>General Settings</span><span
                                                        class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">Profile</a></li>
                                                    <li><a href="#!">Security</a></li>
                                                    <li><a href="#!">Notifications</a></li>
                                                    <li><a href="#!">Connected Apps</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu">
                                                <a href="javascript:void(0);" class="active subdrop"><i
                                                        data-feather="airplay"></i><span>Website Settings</span><span
                                                        class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">System Settings</a></li>
                                                    <li class="active"><a href="{{route('company.settings')}}">Company
                                                            Settings
                                                        </a></li>
                                                    <li><a href="#!">Localization</a></li>
                                                    <li><a href="#!">Prefixes</a></li>
                                                    <li><a href="#!">Preference</a></li>
                                                    <li><a href="#!">Appearance</a></li>
                                                    <li><a href="#!">Social Authentication</a>
                                                    </li>
                                                    <li><a href="#!">Language</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu">
                                                <a href="javascript:void(0);"><i data-feather="archive"></i><span>App
                                                        Settings</span><span class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">Invoice</a></li>
                                                    <li><a href="#!">Printer </a></li>
                                                    <li><a href="#!">POS</a></li>
                                                    <li><a href="#!">Custom Fields</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu">
                                                <a href="javascript:void(0);"><i data-feather="server"></i><span>System
                                                        Settings</span><span class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">Email</a></li>
                                                    <li><a href="#!">SMS Gateways</a></li>
                                                    <li><a href="#!">OTP</a></li>
                                                    <li><a href="#!">GDPR Cookies</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu">
                                                <a href="javascript:void(0);"><i
                                                        data-feather="credit-card"></i><span>Financial
                                                        Settings</span><span class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">Payment Gateway</a></li>
                                                    <li><a href="#!">Bank Accounts </a></li>
                                                    <li><a href="#!">Tax Rates</a></li>
                                                    <li><a href="#!">Currencies</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu">
                                                <a href="javascript:void(0);"><i data-feather="layout"></i><span>Other
                                                        Settings</span><span class="menu-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#!">Storage</a></li>
                                                    <li><a href="#!">Ban IP Address </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="settings-page-wrap">
                        <form>
                            <div class="setting-title">
                                <h4>Company Settings</h4>
                            </div>
                            <div class="company-info">
                                <div class="card-title-head">
                                    <h6><span><i data-feather="zap"></i></span>Company Information</h6>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control" wire:model='name'>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Company Email Address</label>
                                            <input type="email" class="form-control" wire:model='email'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" wire:model='phone'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Website</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-info company-images">
                                <div class="card-title-head">
                                    <h6><span><i data-feather="image"></i></span>Company Images</h6>
                                </div>
                                <ul class="logo-company">
                                    <li class="d-flex align-items-center">
                                        <div class="logo-info">
                                            <h6>Company Logo</h6>
                                            <p>Upload Logo of your Company to display in website</p>
                                        </div>
                                        <div class="profile-pic-upload mb-0">
                                            <div class="new-employee-field">
                                                <div class="mb-0">
                                                    <div class="image-upload mb-0">
                                                        <input type="file">
                                                        <div class="image-uploads">
                                                            <h4><i data-feather="upload"></i>Upload Photo</h4>
                                                        </div>
                                                    </div>
                                                    <span>For better preview recommended size is 450px x 450px. Max size
                                                        5MB.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="new-logo ms-auto">
                                            <a href="#"><img src="{{asset('assets/img/logo-small.png')}}"
                                                    alt="Logo"><span><i data-feather="x"></i></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="company-address">
                                <div class="card-title-head">
                                    <h6><span><i data-feather="map-pin"></i></span>Address</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">State / Province</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
