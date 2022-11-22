@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers Report</h6>
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
                        @forelse($customer_reports as $key => $report)
                            <tr class="odd">
                                <td></td>
                                <td>{{$report[0]->customer->name}}</td>
                                <td>{{$report->count()}}</td>
                                <td>{{$report->sum('sale_payment.total')}}</td>
                                <td>{{$report->sum('sale_payment.paid')}}</td>
                                <td>{{$report->sum('sale_payment.due')}}</td>
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

