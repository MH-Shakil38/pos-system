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
                                colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 39.6875px;">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Customer Name: activate to sort column ascending" style="width: 149.609px;">
                                Supplier Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Phone: activate to sort column ascending" style="width: 88.3594px;">Total Purchase
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Total Amount
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Total Paid
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Country: activate to sort column ascending" style="width: 72.5312px;">
                                Total Due
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($suppliers as $supplier)
                            @php
                                $total  = $supplier->purchases->sum('purchase_payment.total');
                                $paid   = $supplier->purchases->sum('purchase_payment.paid');
                            @endphp
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
                                            src="{{asset($supplier->pictures)}}"
                                            alt="">
                                    </a>
                                    <a href="#">{{$supplier->name}}</a>
                                </td>
                                <td>{{$supplier->purchases->count()}}</td>
                                <td>{{CurrencyFormate($total)}}</td>
                                <td>{{CurrencyFormate($paid)}}</td>
                                <td>{{CurrencyFormate($total - $paid)}}</td>
                                <td>
                                    <a class="me-3 btn btn-info"
                                       href="{{route('admin.report.supplier.purchase.list',$supplier->id)}}">
                                        Purchases List
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
