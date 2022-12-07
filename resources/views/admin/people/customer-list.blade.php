@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.customer.create.blade.php')}}" class="btn btn-added"><img
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
                                colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 39.6875px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Customer Name: activate to sort column ascending" style="width: 149.609px;">
                                Customer Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="code: activate to sort column ascending" style="width: 34.4844px;">code
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Phone: activate to sort column ascending" style="width: 88.3594px;">Phone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Address
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Country: activate to sort column ascending" style="width: 72.5312px;">
                                Country
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $item)
                        <tr class="odd">
                            <td class="sorting_1">
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img
                                        src="{{asset($item->pictures)}}"
                                        alt="">
                                </a>
                                <a href="#">{{$item->name}}</a>
                            </td>
                            <td>{{$item->customer_code}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>+{{$item->address}}</td>
                            <td>{{$item->country_id}}</td>
                            <td>
                                <a class="me-3"
                                   href="https://dreamspos.dreamguystech.com/laravel/template/public/editcustomer">
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
