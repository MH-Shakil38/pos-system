<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/index"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/dashboard.svg"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a class="{{ Route::is('admin.category.*') ||
                                Route::is('admin.brand.*') ||
                                 Route::is('admin.origin.*') ||
                                 Route::is('admin.color.*') ||
                                 Route::is('admin.size.*') ||
                                 Route::is('admin.paymentType.*')
                                 ? 'active' : '' }}" href="javascript:void(0);"><img
                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/product.svg"
                        alt="img"><span> Configuration's</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Route::is('admin.category.index') ? 'active' : '' }}"
                               href="{{route('admin.category.index')}}">
                                Manage Category
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.brand.*') ? 'active' : '' }}"
                               href="{{route('admin.brand.index')}}">
                                Manage Brand's
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.origin.*') ? 'active' : '' }}"
                               href="{{route('admin.origin.index')}}">
                                Manage Origin's
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.color.*') ? 'active' : '' }}"
                               href="{{route('admin.color.index')}}">
                                Manage Color's
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.size.*') ? 'active' : '' }}"
                               href="{{route('admin.size.index')}}">
                               Manage Size's
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.paymentType.*') ? 'active' : '' }}"
                               href="{{route('admin.paymentType.index')}}">
                                Manage Payment Type
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Route::is('admin.product.*') ? 'active' : ''}}" href=" javascript:void(0);">
                        <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/product.svg"
                        alt="img">
                        <span> Product</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ Route::is('admin.supplier.index') ? 'active' : '' }}"
                               href="{{route('admin.supplier.index')}}">
                                Supplier
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.product.index') ? 'active' : '' }}"
                               href="{{route('admin.product.index')}}">
                                Product List
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.product.create') ? 'active' : '' }}"
                               href="{{route('admin.product.create')}}">
                               Add Product
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Route::is('admin.purchase.*') ? 'active' : ''}}" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/purchase1.svg"
                            alt="img"><span> Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Route::is('admin.purchase.index') ? 'active' : ''}}"
                               href="{{route('admin.purchase.index')}}">Purchase
                                List</a></li>
                        <li><a class="{{ Route::is('admin.purchase.create') ? 'active' : ''}}"
                               href="{{route('admin.purchase.create')}}">Add
                                Purchase</a></li>
                        <li><a class="#" href="#">Import Purchase</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/sales1.svg"
                            alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/saleslist">Sales
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/pos">POS</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/add-sales">New
                                Sales</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/salesreturnlists">Sales
                                Return List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/createsalesreturns">New
                                Sales Return</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/expense1.svg"
                            alt="img"><span> Expense</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/expenselist">Expense
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/createexpense">Add
                                Expense</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/expensecategory">Expense
                                Category</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/quotation1.svg"
                            alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/quotationlist">Quotation
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/addquotation">Add
                                Quotation</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/transfer1.svg"
                            alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/transferlist">Transfer
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/addtransfer">Add
                                Transfer </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/importtransfer">Import
                                Transfer </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/return1.svg"
                            alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/salesreturnlist">Sales
                                Return List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/createsalesreturn">Add
                                Sales Return </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/purchasereturnlist">Purchase
                                Return List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/createpurchasereturn">Add
                                Purchase Return </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/users1.svg"
                            alt="img"><span> People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/customerlist">Customer
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/addcustomer">Add
                                Customer </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/supplierlist">Supplier
                                List</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/addsupplier">Add
                                Supplier </a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/userlist">User
                                List</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/adduser">Add
                                User</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/storelist">Store
                                List</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/addstore">Add
                                Store</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/places.svg"
                            alt="img"><span> Places</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/newcountry">New
                                Country</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/countrieslist">Countries
                                list</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/newstate">New
                                State </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/statelist">State
                                list</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/components"><i
                            data-feather="layers"></i><span> Components</span> </a>
                </li>
                <li>
                    <a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/blankpage"><i
                            data-feather="file"></i><span> Blank Page</span> </a>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="alert-octagon"></i>
                        <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/error-404">404
                                Error </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/error-500">500
                                Error </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/sweetalerts">Sweet
                                Alerts</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/tooltip">Tooltip</a>
                        </li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/popover">Popover</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/ribbon">Ribbon</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/clipboard">Clipboard</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/drag-drop">Drag &
                                Drop</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/rangeslider">Range
                                Slider</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/rating">Rating</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/toastr">Toastr</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/text-editor">Text
                                Editor</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/counter">Counter</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/scrollbar">Scrollbar</a>
                        </li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/spinner">Spinner</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/notification">Notification</a>
                        </li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/lightbox">Lightbox</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/stickynote">Sticky
                                Note</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/timeline">Timeline</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-wizard">Form
                                Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/chart-apex">Apex
                                Charts</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/chart-js">Chart
                                Js</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/chart-morris">Morris
                                Charts</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/chart-flot">Flot
                                Charts</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/chart-peity">Peity
                                Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-fontawesome">Fontawesome
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-feather">Feather
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-ionic">Ionic
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-material">Material
                                Icons</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-pe7">Pe7
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-simpleline">Simpleline
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-themify">Themify
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-weather">Weather
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-typicon">Typicon
                                Icons</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/icon-flag">Flag
                                Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-basic-inputs">Basic
                                Inputs </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-input-groups">Input
                                Groups </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-horizontal">Horizontal
                                Form </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-vertical">
                                Vertical Form </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-mask">Form
                                Mask </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-validation">Form
                                Validation </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-select2">Form
                                Select2 </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/form-fileupload">File
                                Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/tables-basic">Basic
                                Tables </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/data-tables">Data
                                Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/product.svg"
                            alt="img"><span> Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/chat">Chat</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/calendar">Calendar</a>
                        </li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/email">Email</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/time.svg"
                            alt="img"><span> Report</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/purchaseorderreport">Purchase
                                order report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/inventoryreport">Inventory
                                Report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/salesreport">Sales
                                Report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/invoicereport">Invoice
                                Report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/purchasereport">Purchase
                                Report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/supplierreport">Supplier
                                Report</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/customerreport">Customer
                                Report</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/users1.svg"
                            alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/newuser">New
                                User </a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/userlists">Users
                                List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="" href="javascript:void(0);"><img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/settings.svg"
                            alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/generalsettings">General
                                Settings</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/emailsettings">Email
                                Settings</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/paymentsettings">Payment
                                Settings</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/currencysettings">Currency
                                Settings</a></li>
                        <li><a class=""
                               href="https://dreamspos.dreamguystech.com/laravel/template/public/grouppermissions">Group
                                Permissions</a></li>
                        <li><a class="" href="https://dreamspos.dreamguystech.com/laravel/template/public/taxrates">Tax
                                Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


{{--<nav class="mt-2">--}}
{{--    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}
{{--        <!-- Add icons to the links using the .nav-icon class--}}
{{--             with font-awesome or any other icon font library -->--}}
{{--        <li class="nav-item menu-open">--}}
{{--            <a href="#" class="nav-link active">--}}
{{--                <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                <p>--}}
{{--                    Dashboard--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="./index.html" class="nav-link active">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Dashboard v1</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fa fa-cog"></i>--}}
{{--                <p>--}}
{{--                    Configurations--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                    <span class="badge badge-info right">6</span>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.category.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Category</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.brand.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Brand</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.origin.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Origin</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.size.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Size</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.color.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Color <small>+ Custom Area</small></p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.paymentType.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Payment Type</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-tree"></i>--}}
{{--                <p>--}}
{{--                    Supplier--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.supplier.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Supplier Manage</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/UI/icons.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Icons</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-chart-pie"></i>--}}
{{--                <p>--}}
{{--                    Product--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.product.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Product List</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.product.create')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Manage Product</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-chart-pie"></i>--}}
{{--                <p>--}}
{{--                   Manage <small>Stock/Purchase</small>--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.purchase.create')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Purchase <small>Create</small></p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.product.create')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Manage Product</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-edit"></i>--}}
{{--                <p>--}}
{{--                    Forms--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/forms/general.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>General Elements</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/forms/advanced.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Advanced Elements</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/forms/editors.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Editors</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/forms/validation.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Validation</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-table"></i>--}}
{{--                <p>--}}
{{--                    Tables--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/tables/simple.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Simple Tables</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/tables/data.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>DataTables</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/tables/jsgrid.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>jsGrid</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        <li class="nav-item border-top">--}}
{{--            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">--}}
{{--                <i class="fas fa-sign-out-alt"></i>--}}
{{--                {{ __('Logout') }}--}}
{{--            </a>--}}
{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}
