@extends('admin.layouts.master')
@section('content')
    <div class="card-header">
        @include('admin.include.page_header',
                    ['header_name'=>'Customer order details',
                    'title'=>'Customer Order details report show here',
                    ])
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="background: lightseagreen">
                    <h3 class="ps-0">{{$customer->name}} - Order details</h3>
                </div>
                <div class="card-body">

                    {{--Table hader start--}}
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
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a href="{{route('admin.report.pdf.single.customer.order.list',$customer->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
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

                    {{--                    table header end--}}
                    <hr>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                                   aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>

                                    <th style="width: 5px;">#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 80.047px;">Ref-No
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
                                @forelse($customer->sales as $key => $data)
                                    <tr class="odd">
                                        <td>{{$loop->iteration}}</td>
                                        <td>Ref-{{$data->ref}}</td>
                                        <td>{{$data->sale_payment->total}}</td>
                                        <td>{{$data->sale_payment->paid}}</td>
                                        <td>
                                            {{$data->sale_payment->total> $data->sale_payment->paid ?
                                                $data->sale_payment->total-$data->sale_payment->paid : '-'}}
                                        </td>
                                        <td class="align-center">
                                            <a class="btn btn-info"
                                               href="{{route('admin.report.customer.order.details',$data->id)}}">Order
                                                Details</a>
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
        </div>
    </div>
@endsection

