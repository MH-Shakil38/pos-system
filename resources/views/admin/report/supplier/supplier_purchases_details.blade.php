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
                                    <span>[#]</span>
                                </label>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Phone: activate to sort column ascending" style="width: 88.3594px;">Product Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Quantity
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Brand
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Color
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Size
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="email: activate to sort column ascending" style="width: 146.125px;">Purchase Price
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Country: activate to sort column ascending" style="width: 72.5312px;">
                                Selling Price
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending" style="width: 61.7188px;">Created By
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($purchases->purchase_details as $supplier)
                            <tr>
                                <td class="sorting_1">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                        <span>{{$loop->iteration}}</span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img
                                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg"
                                            alt="product">
                                    </a>
                                    <a href="javascript:void(0);">{{$supplier->product->name??''}}</a>
                                </td>
                                <td>{{$supplier->qty}}</td>
                                <td>{{$supplier->brand->name}}</td>
                                <td>{{$supplier->color->name}}</td>
                                <td>{{$supplier->size->name}}</td>
                                <td>{{$supplier->category->name}}</td>
                                <td>{{$supplier->purchase_price}}</td>
                                <td>{{$supplier->selling_price}}</td>
                                <td>{{$supplier->qty * $supplier->purchase_price}}</td>
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
