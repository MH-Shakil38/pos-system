@extends('admin.layouts.master')
@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>PURCHASE LIST</h4>
            <h6>Manage your purchases</h6>
        </div>
        <div class="page-btn">
            <a href="https://dreamspos.dreamguystech.com/laravel/template/public/addpurchase" class="btn btn-added">
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
                                            aria-disabled="false" aria-labelledby="select2-l0z5-container"><span
                                                class="select2-selection__rendered" id="select2-l0z5-container"
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
                                            aria-disabled="false" aria-labelledby="select2-ms6r-container"><span
                                                class="select2-selection__rendered" id="select2-ms6r-container"
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
                                            aria-disabled="false" aria-labelledby="select2-b0ib-container"><span
                                                class="select2-selection__rendered" id="select2-b0ib-container"
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
                                colspan="1" aria-sort="ascending" aria-label="




: activate to sort column descending" style="width: 47.2375px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Supplier Name: activate to sort column ascending" style="width: 130.2px;">
                                Supplier Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Reference: activate to sort column ascending" style="width: 80.525px;">
                                Reference
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Date: activate to sort column ascending" style="width: 79.8875px;">Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending" style="width: 76.3125px;">Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Grand Total: activate to sort column ascending" style="width: 93.9625px;">
                                Grand Total
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Paid: activate to sort column ascending" style="width: 38.925px;">Paid
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Due: activate to sort column ascending" style="width: 36.7625px;">Due
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Payment Status: activate to sort column ascending"
                                style="width: 124.062px;">Payment Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 71.325px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($purchases as $row)
                            <tr class="odd">
                                <td class="sorting_1">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="text-bolds">[{{$loop->iteration}}] {{$row->supplier->name}}</td>
                                <td>{{$row->ref}}</td>
                                <td>{{$row->date}}</td>
                                <td><span class="badges bg-lightgreen">Received</span></td>
                                <td>{{$row->purchase_payment->total}}</td>
                                <td>{{$row->purchase_payment->paid ?? 'null'}}</td>
                                <td>{{$row->purchase_payment->due ?? 'null'}}</td>
                                <td><span class="badges {{$row->purchase_payment->total > $row->purchase_payment->paid ? 'bg-lightred' : 'bg-lightgreen'}}">{{$row->purchase_payment->total > $row->purchase_payment->paid ? 'due' : 'paid'}}</span></td>
                                <td>
                                    <a class="me-3"
                                       href="{{route('admin.purchase.details',$row->id)}}">
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

                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1 - 10 of
                        14 items
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
