@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>PURCHASE LIST</h4>
            <h6>Manage your purchases</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.purchase.create')}}" class="btn btn-added">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg"
                     alt="img">Add New Purchases
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img
                                src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/filter.svg"
                                alt="img">
                            <span><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/closes.svg"
                                    alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img
                                src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/search-white.svg"
                                alt="img"></a>
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> <input type="search"
                                                                                                     class="form-control form-control-sm"
                                                                                                     placeholder="Search..."
                                                                                                     aria-controls="DataTables_Table_0"></label>
                        </div>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="pdf"
                               aria-label="pdf"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/pdf.svg"
                                    alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="excel"
                               aria-label="excel"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/excel.svg"
                                    alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="print"
                               aria-label="print"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/printer.svg"
                                    alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Reference">
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select select2-hidden-accessible" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                    <option data-select2-id="3">Choose Supplier</option>
                                    <option>Supplier</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                               data-select2-id="2" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-p0qc-container"><span
                                                class="select2-selection__rendered" id="select2-p0qc-container"
                                                role="textbox" aria-readonly="true" title="Choose Supplier">Choose Supplier</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select select2-hidden-accessible" data-select2-id="4" tabindex="-1"
                                        aria-hidden="true">
                                    <option data-select2-id="6">Choose Status</option>
                                    <option>Inprogress</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                               data-select2-id="5" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-k88e-container"><span
                                                class="select2-selection__rendered" id="select2-k88e-container"
                                                role="textbox" aria-readonly="true"
                                                title="Choose Status">Choose Status</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select select2-hidden-accessible" data-select2-id="7" tabindex="-1"
                                        aria-hidden="true">
                                    <option data-select2-id="9">Choose Payment Status</option>
                                    <option>Payment Status</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                               data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-frlj-container"><span
                                                class="select2-selection__rendered" id="select2-frlj-container"
                                                role="textbox" aria-readonly="true" title="Choose Payment Status">Choose Payment Status</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12">
                            <div class="form-group">
                                <a class="btn btn-filters ms-auto"><img
                                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/search-whites.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                           aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label=" : activate to sort column descending"
                                style="width: 35px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Supplier Name: activate to sort column ascending" style="width: 106.328px;">
                                Product Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Reference: activate to sort column ascending" style="width: 63.625px;">
                               Supplier Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Date: activate to sort column ascending" style="width: 63.0781px;">Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Date: activate to sort column ascending" style="width: 63.0781px;">Color
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending" style="width: 60px;">Size
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Grand Total: activate to sort column ascending" style="width: 75.1719px;">
                                Quantity
                            </th>
{{--                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"--}}
{{--                                aria-label="Due: activate to sort column ascending" style="width: 26px;">Due--}}
{{--                            </th>--}}
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Payment Status: activate to sort column ascending"
                                style="width: 101.047px;">Price
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 50.8906px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                    @forelse($purchases as $item)
                        <tr class="odd">
                            <td class="sorting_1">
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="text-bolds">{{$item->product->name}}</td>
                            <td>{{$item->supplier->name}}</td>
                            <td>{{$item->purchase_detail->category->name}}</td>
                            <td>{{$item->purchase_detail->color->name}}</td>
                            <td>{{$item->purchase_detail->size->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                <a class="me-3"
                                   href="https://dreamspos.dreamguystech.com/laravel/template/public/editpurchase">
                                    <img
                                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg"
                                        alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                    <img
                                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg"
                                        alt="img">
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                        </tbody>
                    </table>
                    <div class="dataTables_length" id="DataTables_Table_0_length"><label><select
                                name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></label></div>
                    <div class="dataTables_paginate paging_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0"
                                                                            data-dt-idx="0" tabindex="0"
                                                                            class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                      data-dt-idx="1" tabindex="0"
                                                                      class="page-link">2</a></li>
                        </ul>
                    </div>
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1 - 10 of
                        14 items
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
