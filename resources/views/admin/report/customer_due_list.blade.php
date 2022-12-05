@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers Report</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-sm-12 col-lg-7">
            <div class="card">
                <div class="card-header" style="background: lightseagreen">
                    <h3 class="ps-0">{{$sale->customer->name}} - Due list</h3>
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
                                @forelse($customer_dues as $key => $data)
                                    @if($data->sale_payment->total > $data->sale_payment->paid)
                                        <tr class="odd">
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>Ref-{{$data->ref}}</td>
                                            <td>{{$data->sale_payment->total}}</td>
                                            <td>{{$data->sale_payment->paid}}</td>
                                            <td>{{$data->sale_payment->total-$data->sale_payment->paid}}</td>
                                            <td>
                                                <a href="{{route('admin.customer.due.payment',$data->id)}}" class="btn btn-info">Pay</a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 col-lg-5">
            <div class="card">
                <div class="card-header" style="background: lightseagreen">
                    <h3 class="ps-0">Drop Payment</h3>
                </div>
                @if(isset($sale))
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <h3>Due: {{$sale->sale_payment->total}}</h3>
                            {!! Form::model($sale ?? '', ['route' => ['admin.customer.payment.update', $sale->id??'']]) !!}
                            <input type="hidden" name="customer_id" value="{{$sale->customer->id}}">
                            <input type="hidden" name="sale_id" value="{{$sale->id}}">
                            <div class="form-group row d-flex justify-content-center">
                                <label for="">Payment</label>
                                <input class="text-end form-control" name="paid" type="number" value="{{ $sale->sale_payment->total - $sale->sale_payment->paid }}"  style="width: 300px">
                            </div>
                            @if(isset($sale))
                                <button class="btn btn-primary">Payment</button>
                            @endif
                            {!! Form::close() !!}
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

