@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers Report</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header text-white" style="background: lightseagreen" >
                    <h3 class="ps-0">{{$order_details->customer->name}} - {{$order_details->created_at->format('d M y')}} Order</h3>
                </div>
                <div class="card-body">
                    @include('admin.include.table-header')
                    <hr>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                                   aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>QTY</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>sale Price</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order_details->sale_details as $key => $item)
                                    <tr>
                                        <td class="sorting_1">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            <a class="product-img">
                                                <img
                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">{{$item->product->name??''}}</a>
                                        </td>
                                        <td>{{$item->qty??''}}</td>
                                        <td>{{$item->brand->name ??''}}</td>
                                        <td>{{$item->color->name??''}}</td>
                                        <td>{{$item->size->name??''}}</td>
                                        <td><span>৳ {{$item->selling_price ??''}}</span></td>
                                        <td><span>৳ {{$item->selling_price * $item->qty ??''}}</span></td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

