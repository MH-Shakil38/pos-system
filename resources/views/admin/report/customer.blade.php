@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers Report</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/filter.svg"
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
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a href="{{route('admin.report.pdf.all.customer.sale')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/pdf.svg"
                                    alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/excel.svg"
                                    alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/printer.svg"
                                    alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select">
                                    <option>Choose Category</option>
                                    <option>Computers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select">
                                    <option>Choose Sub Category</option>
                                    <option>Fruits</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select">
                                    <option>Choose Sub Brand</option>
                                    <option>Iphone</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                            <div class="form-group">
                                <a class="btn btn-filters ms-auto"><img
                                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/search-whites.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                           aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending"
                                style="width: 39.6875px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                style="width: 103.047px;">Customer Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Reference: activate to sort column ascending"
                                style="width: 63.625px;">Total Order
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 60px;">Total Amount
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Payment: activate to sort column ascending"
                                style="width: 60px;">Total Paid
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Total: activate to sort column ascending"
                                style="width: 32.2344px;">Total Due
                            </th>
                            <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                style="width: 41.4062px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $key => $customer)
                            @php
                                $total = $customer->sales->sum('sale_payment.total');
                                $paid = $customer->sales->sum('sale_payment.paid');
                            @endphp
                            <tr class="odd">
                                <td></td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->sales->count()}}</td>
                                <td>{{CurrencyFormate($total)}}</td>
                                <td>{{CurrencyFormate($paid)}}</td>
                                <td>
                                    <span class="badges {{$total- $paid > 0 ? 'bg-lightred' : 'bg-lightgreen'}} ">
                                        {{CurrencyFormate($total - $paid)}}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{route('admin.report.customer.order.list',$customer->id)}}">Order List</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

