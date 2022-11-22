@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.customer.create')}}" class="btn btn-added"><img
                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg"
                    alt="img">Add Customer</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @include('admin.include.table-header')
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
                                colspan="1" aria-label="Date: activate to sort column ascending"
                                style="width: 101.031px;">Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                style="width: 103.047px;">Customer Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Reference: activate to sort column ascending"
                                style="width: 63.625px;">Reference
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 60px;">Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Payment: activate to sort column ascending"
                                style="width: 60px;">Payment
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Total: activate to sort column ascending"
                                style="width: 32.2344px;">Total
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Paid: activate to sort column ascending"
                                style="width: 27.8594px;">Paid
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Due: activate to sort column ascending"
                                style="width: 26px;">Due
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Biller: activate to sort column ascending"
                                style="width: 34.2031px;">Biller
                            </th>
                            <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                style="width: 41.4062px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @forelse($sales as $sale)--}}
                        {{--                            <tr class="odd">--}}
                        {{--                                <td class="sorting_1">--}}
                        {{--                                    <label class="checkboxs">--}}
                        {{--                                        <input type="checkbox">--}}
                        {{--                                        <span class="checkmarks"></span>--}}
                        {{--                                    </label>--}}
                        {{--                                </td>--}}
                        {{--                                <td>{{$sale->created_at->format('d M y')}}</td>--}}
                        {{--                                <td>{{$sale->customer->name}}</td>--}}
                        {{--                                <td>{{$sale->ref}}</td>--}}
                        {{--                                <td><span class="badges bg-lightgreen">Received</span></td>--}}
                        {{--                                <td><span class="badges {{$sale->sale_payment->total > $sale->sale_payment->paid ?  'bg-lightred' : 'bg-lightgreen'}} ">{{$sale->sale_payment->total > $sale->sale_payment->paid ? 'Due':'Paid'}}</span></td>--}}
                        {{--                                <td>{{$sale->sale_payment->total}}</td>--}}
                        {{--                                <td>{{$sale->sale_payment->paid}}</td>--}}
                        {{--                                <td class="text-red">{{ $sale->sale_payment->total > $sale->sale_payment->paid ? $sale->sale_payment->total - $sale->sale_payment->paid : ''}}</td>--}}
                        {{--                                <td>{{$sale->admin ?? 'Admin'}}</td>--}}
                        {{--                                <td class="text-center">--}}
                        {{--                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"--}}
                        {{--                                       aria-expanded="true">--}}
                        {{--                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                    <ul class="dropdown-menu">--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="{{route('admin.sale.details',$sale->id)}}"--}}
                        {{--                                               class="dropdown-item"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye1.svg"--}}
                        {{--                                                    class="me-2" alt="img">Sale Detail</a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="{{route('admin.sale.invoice',$sale->id)}}" class="dropdown-item"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/download.svg"--}}
                        {{--                                                    class="me-2" alt="img">Download pdf</a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="https://dreamspos.dreamguystech.com/laravel/template/public/edit-sales"--}}
                        {{--                                               class="dropdown-item"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg"--}}
                        {{--                                                    class="me-2" alt="img">Edit Sale</a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"--}}
                        {{--                                               data-bs-target="#showpayment"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/dollar-square.svg"--}}
                        {{--                                                    class="me-2" alt="img">Show Payments</a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"--}}
                        {{--                                               data-bs-target="#createpayment"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus-circle.svg"--}}
                        {{--                                                    class="me-2" alt="img">Create Payment</a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="javascript:void(0);" class="dropdown-item confirm-text"><img--}}
                        {{--                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete1.svg"--}}
                        {{--                                                    class="me-2" alt="img">Delete Sale</a>--}}
                        {{--                                        </li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </td>--}}
                        {{--                            </tr>--}}
                        {{--                        @empty--}}
                        {{--                        @endforelse--}}
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

