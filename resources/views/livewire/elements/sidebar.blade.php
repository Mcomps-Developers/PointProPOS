<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    @if (Auth::user()->utype==='adm')
                    <li class="submenu-open">
                        <ul>
                            <li>
                                <a href="{{route('admin.dashboard')}}" class="active"><i
                                        data-feather="grid"></i><span>Dashboard</span></a>
                            </li>
                            <li><a href="{{route('admin.clients')}}"><i data-feather="menu"></i><span>Clients</span></a>
                            <li><a href="{{route('admin.industries')}}"><i
                                        data-feather="codepen"></i><span>Industries</span></a>
                        </ul>
                    </li>
                    @elseif (Auth::user()->utype==='man')
                    <li>
                        <a href="{{route('manager.dashboard')}}" class="active"><i
                                data-feather="grid"></i><span>Dashboard</span></a>
                    </li>
                    @else
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Inventory</h6>
                        <ul>
                            <li><a href="product-list.html"><i data-feather="box"></i><span>Products</span></a></li>
                            <li><a href="add-product.html"><i data-feather="plus-square"></i><span>Create
                                        Product</span></a></li>
                            <li><a href="expired-products.html"><i data-feather="codesandbox"></i><span>Expired
                                        Products</span></a></li>
                            <li><a href="low-stocks.html"><i data-feather="trending-down"></i><span>Low
                                        Stocks</span></a></li>
                            <li><a href="category-list.html"><i data-feather="codepen"></i><span>Category</span></a>
                            </li>
                            <li><a href="sub-categories.html"><i data-feather="speaker"></i><span>Sub
                                        Category</span></a></li>
                            <li><a href="brand-list.html"><i data-feather="tag"></i><span>Brands</span></a></li>
                            <li><a href="units.html"><i data-feather="speaker"></i><span>Units</span></a></li>
                            <li><a href="varriant-attributes.html"><i data-feather="layers"></i><span>Variant
                                        Attributes</span></a></li>
                            <li><a href="warranty.html"><i data-feather="bookmark"></i><span>Warranties</span></a>
                            </li>
                            <li><a href="barcode.html"><i data-feather="align-justify"></i><span>Print
                                        Barcode</span></a></li>
                            <li><a href="qrcode.html"><i data-feather="maximize"></i><span>Print QR Code</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Stock</h6>
                        <ul>
                            <li><a href="manage-stocks.html"><i data-feather="package"></i><span>Manage
                                        Stock</span></a></li>
                            <li><a href="stock-adjustment.html"><i data-feather="clipboard"></i><span>Stock
                                        Adjustment</span></a></li>
                            <li><a href="stock-transfer.html"><i data-feather="truck"></i><span>Stock
                                        Transfer</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Sales</h6>
                        <ul>
                            <li><a href="sales-list.html"><i data-feather="shopping-cart"></i><span>Sales</span></a>
                            </li>
                            <li><a href="invoice-report.html"><i data-feather="file-text"></i><span>Invoices</span></a>
                            </li>
                            <li><a href="sales-returns.html"><i data-feather="copy"></i><span>Sales
                                        Return</span></a></li>
                            <li><a href="quotation-list.html"><i data-feather="save"></i><span>Quotation</span></a>
                            </li>
                            <li><a href="pos.html"><i data-feather="hard-drive"></i><span>POS</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Promo</h6>
                        <ul>
                            <li><a href="coupons.html"><i data-feather="shopping-cart"></i><span>Coupons</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Purchases</h6>
                        <ul>
                            <li><a href="purchase-list.html"><i
                                        data-feather="shopping-bag"></i><span>Purchases</span></a></li>
                            <li><a href="purchase-order-report.html"><i data-feather="file-minus"></i><span>Purchase
                                        Order</span></a></li>
                            <li><a href="purchase-returns.html"><i data-feather="refresh-cw"></i><span>Purchase
                                        Return</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Finance & Accounts</h6>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="file-text"></i><span>Expenses</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="expense-list.html">Expenses</a></li>
                                    <li><a href="expense-category.html">Expense Category</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Peoples</h6>
                        <ul>
                            <li><a href="customers.html"><i data-feather="user"></i><span>Customers</span></a></li>
                            <li><a href="suppliers.html"><i data-feather="users"></i><span>Suppliers</span></a></li>
                            <li><a href="store-list.html"><i data-feather="home"></i><span>Stores</span></a></li>
                            <li><a href="warehouse.html"><i data-feather="archive"></i><span>Warehouses</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">HRM</h6>
                        <ul>
                            <li><a href="employees-grid.html"><i data-feather="user"></i><span>Employees</span></a>
                            </li>
                            <li><a href="department-grid.html"><i data-feather="users"></i><span>Departments</span></a>
                            </li>
                            <li><a href="designation.html"><i data-feather="git-merge"></i><span>Designation</span></a>
                            </li>
                            <li><a href="shift.html"><i data-feather="shuffle"></i><span>Shifts</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i
                                        data-feather="book-open"></i><span>Attendence</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="attendance-employee.html">Employee</a></li>
                                    <li><a href="attendance-admin.html">Admin</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="calendar"></i><span>Leaves</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                    <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                    <li><a href="leave-types.html">Leave Types</a></li>
                                </ul>
                            </li>
                            <li><a href="holidays.html"><i data-feather="credit-card"></i><span>Holidays</span></a>
                            </li>
                            <li class="submenu">
                                <a href="payroll-list.html"><i data-feather="dollar-sign"></i><span>Payroll</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payroll-list.html">Employee Salary</a></li>
                                    <li><a href="payslip.html">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Reports</h6>
                        <ul>
                            <li><a href="sales-report.html"><i data-feather="bar-chart-2"></i><span>Sales
                                        Report</span></a></li>
                            <li><a href="purchase-report.html"><i data-feather="pie-chart"></i><span>Purchase
                                        report</span></a></li>
                            <li><a href="inventory-report.html"><i data-feather="inbox"></i><span>Inventory
                                        Report</span></a></li>
                            <li><a href="invoice-report.html"><i data-feather="file"></i><span>Invoice
                                        Report</span></a></li>
                            <li><a href="supplier-report.html"><i data-feather="user-check"></i><span>Supplier
                                        Report</span></a></li>
                            <li><a href="customer-report.html"><i data-feather="user"></i><span>Customer
                                        Report</span></a></li>
                            <li><a href="expense-report.html"><i data-feather="file"></i><span>Expense
                                        Report</span></a></li>
                            <li><a href="income-report.html"><i data-feather="bar-chart"></i><span>Income
                                        Report</span></a></li>
                            <li><a href="tax-reports.html"><i data-feather="database"></i><span>Tax
                                        Report</span></a></li>
                            <li><a href="profit-and-loss.html"><i data-feather="pie-chart"></i><span>Profit &
                                        Loss</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">User Management</h6>
                        <ul>
                            <li><a href="users.html"><i data-feather="user-check"></i><span>Users</span></a></li>
                            <li><a href="roles-permissions.html"><i data-feather="shield"></i><span>Roles &
                                        Permissions</span></a></li>
                            <li><a href="delete-account.html"><i data-feather="lock"></i><span>Delete Account
                                        Request</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Settings</h6>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="settings"></i><span>General
                                        Settings</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="general-settings.html">Profile</a></li>
                                    <li><a href="security-settings.html">Security</a></li>
                                    <li><a href="notification.html">Notifications</a></li>
                                    <li><a href="connected-apps.html">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="globe"></i><span>Website
                                        Settings</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="system-settings.html">System Settings</a></li>
                                    <li><a href="company-settings.html">Company Settings </a></li>
                                    <li><a href="localization-settings.html">Localization</a></li>
                                    <li><a href="prefixes.html">Prefixes</a></li>
                                    <li><a href="preference.html">Preference</a></li>
                                    <li><a href="appearance.html">Appearance</a></li>
                                    <li><a href="social-authentication.html">Social Authentication</a></li>
                                    <li><a href="language-settings.html">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="smartphone"></i>
                                    <span>App Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="invoice-settings.html">Invoice</a></li>
                                    <li><a href="printer-settings.html">Printer</a></li>
                                    <li><a href="pos-settings.html">POS</a></li>
                                    <li><a href="custom-fields.html">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="monitor"></i>
                                    <span>System Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="email-settings.html">Email</a></li>
                                    <li><a href="sms-gateway.html">SMS Gateways</a></li>
                                    <li><a href="otp-settings.html">OTP</a></li>
                                    <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="dollar-sign"></i>
                                    <span>Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                    <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                    <li><a href="tax-rates.html">Tax Rates</a></li>
                                    <li><a href="currency-settings.html">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="hexagon"></i>
                                    <span>Other Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="storage-settings.html">Storage</a></li>
                                    <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="signin.html"><i data-feather="log-out"></i><span>Logout</span> </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
