@extends('admin.layouts.master')
@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/css/invoice.css')}}">
@endsection

@section('content')
    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #111-222
                </small>
            </h1>

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="{{route('admin.purchase.invoice',$purchase->id)}}" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Export
                    </a>
                </div>
            </div>
        </div>
        <div class="card" style="background: azure;">
            <div class="card-header">
                <div class="container px-0">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-150">
                                        <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                        <h2 class="d-inline"><span class="text-default-d3">Maynuddin POS SYSTEM</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->

                            <hr class="row brc-default-l1 mx-n1 mb-4"/>

                            <div class="row bg-gradient-cyan">
                                <div class="col-sm-6">
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                                        <span
                                            class="text-600 text-110 text-blue align-middle">{{$purchase->supplier->name}}</span>
                                    </div>
                                    <div class="text-grey-m2">
                                        <div class="my-1">
                                            {{$purchase->supplier->address}}
                                        </div>
                                        <div class="my-1">
                                            {{$purchase->supplier->city_id}}
                                            , {{$purchase->supplier->country_id}}
                                        </div>
                                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i>
                                            <b class="text-600">{{$purchase->supplier->phone}}</b></div>
                                    </div>
                                </div>
                                <!-- /.col -->

                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <hr class="d-sm-none"/>
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Invoice
                                        </div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">ID:</span> #{{$purchase->id}}</div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Issue Date:</span>
                                            {{$purchase->purchase_payment->created_at->format('d M y')}}</div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Status:</span> <span
                                                class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>QTY</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Origin</th>
                                                    <th>Purchase Price</th>
                                                    <th>Selling Price</th>
                                                    <th class="text-end">Sub Total</th>
                                                </tr>
                                                </thead>
                                                <tbody id="append-row" class="append-row">
                                                @forelse($purchase->purchase_details as $item)
                                                    <tr>
                                                        <td class="productimgname">
                                                            <a class="product-img">
                                                                <img
                                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg"
                                                                    alt="product">
                                                            </a>
                                                            <a href="javascript:void(0);">{{$item->product->name}}</a>
                                                        </td>
                                                        <td>{{$item->qty}}</td>
                                                        <td>{{$item->category->name}}</td>
                                                        <td>{{$item->brand->name}}</td>
                                                        <td>{{$item->color->name}}</td>
                                                        <td>{{$item->size->name}}</td>
                                                        <td>{{$item->origin->name}}</td>
                                                        <td><span>৳ {{$item->purchase_price}}</span>
                                                        </td>
                                                        <td><span>৳ {{$item->selling_price}}</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span>৳ {{$item->qty*$item->purchase_price}}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse

                                                </tbody>
                                                <tr>
                                                    <td colspan="9" class="text-end"><h4>Grand Total :</h4></td>
                                                    <td colspan="2" class="text-center"><h5 id="grand_total">৳ {{$total}}</h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection



