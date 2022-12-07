@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.include.page_header',
                        ['header_name'=>'Create Employee',
                        'title'=>'employee view',
                        'route'=>'admin.employee.create',
                        'button_name'=>'Employee Create'])
        </div>

        <div class="card-body">
            @include('admin.include.table-header')
            <hr>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                           aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr >
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending"
                                style="width: 39.6875px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Customer Name: activate to sort column ascending" style="width: 100.609px;">
                                Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="code: activate to sort column ascending" style="width: 34.4844px;">Email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Phone: activate to sort column ascending" style="width: 88.3594px;">Phone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Country: activate to sort column ascending" style="width: 72.5312px;">
                                Present Address
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">
                                Permanent Address
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Joining
                                Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Joining
                                Salary
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Joining
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $item)
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
                                            src="{{asset($item->image)}}"
                                            alt="">
                                    </a>
                                    <a href="#">{{$item->user->name}}</a>
                                </td>
                                <td>{{$item->user->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->present_address}}</td>
                                <td>{{$item->permanent_address}}</td>
                                <td>{{$item->joining_date}}</td>
                                <td>{{CurrencyFormate($item->joining_salary)}}</td>
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
                </div>
            </div>
        </div>
    </div>
@endsection
