@extends('admin.layouts.master')
@section('content')
    <div class="row">
        {{--page header start--}}
        <div class="col-md-12 col-sm-12 col-lg-12">
            @include('admin.include.page_header',['route'=>'admin.sale.create','header_name'=>'Sale Report','title'=>'Manage your Sale Report'])
        </div>
        {{-- page header end--}}

        {{--report search start from hear--}}
        <div class="col-md-2 col-sm-12 col-lg-2"></div>
        <div class="col-md-8 col-sm-12 col-lg-8">
            @include('admin.report.include.sale_search_form')
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2"></div>
        {{--report search end from hear--}}

        {{--Data Table Start--}}
        <div class="col-md-12 col-lg-12 col-sm-12">
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
                                            <span>#</span>
                                        </label>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 103.047px;">Date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 103.047px;">Customer Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 103.047px;">Reference
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Status: activate to sort column ascending"
                                        style="width: 60px;">Total
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Payment: activate to sort column ascending"
                                        style="width: 60px;">Paid
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Total: activate to sort column ascending"
                                        style="width: 32.2344px;">Due
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Total: activate to sort column ascending"
                                        style="width: 32.2344px;">Payment Type
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Total: activate to sort column ascending"
                                        style="width: 32.2344px;">Status
                                    </th>
                                    <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 41.4062px;">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sales as $sale)
                                    @php
                                        $total = $sale->sale_payment->total;
                                        $paid = $sale->sale_payment->paid;
                                    @endphp
                                        <tr>
                                            <td class="sorting_1">
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                    <span>#{{$loop->iteration}}</span>
                                                </label>
                                            </td>
                                            <td>{{$sale->created_at->format('Y M d')}}</td>
                                            <td>{{$sale->customer->name}}</td>
                                            <td>{{$sale->ref}}</td>
                                            <td>{{CurrencyFormate($total)}}</td>
                                            <td>{{CurrencyFormate($paid)}}</td>
                                            <td>{{CurrencyFormate($total - $paid)}}</td>
                                            <td>{{$sale->sale_payment->payment_type->name}}</td>
                                            <td>{{$sale->status}}</td>
                                            <td><button class="btn btn-primary">Edit</button></td>
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
        {{--Data Table end--}}
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2({
            width: 'resolve' // need to override the changed default
        });
    </script>
@endsection

