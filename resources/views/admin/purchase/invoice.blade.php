<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        /*position: absolute;*/
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#6</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">162695CDFS</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">03-06-2022</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png"><span>Maynuddin.com</span>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Gujarat</p>
                    <p>360004</p>
                    <p>Near Haveli Road,</p>
                    <p>Lal Darvaja,</p>
                    <p>India</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>Rajkot</p>
                    <p>360012</p>
                    <p>Hanumanji Temple,</p>
                    <p>Lati Ploat</p>
                    <p>Gujarat</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Cash On Delivery</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">SKU</th>
            <th class="w-50">Product Name</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
            <th class="w-50">Tax Amount</th>
            <th class="w-50">Grand Total</th>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$204.2</td>
            <td>3</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.60</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$254.2</td>
            <td>2</td>
            <td>$500</td>
            <td>$50</td>
            <td>$120.00</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$554.2</td>
            <td>5</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.00</td>
        </tr>
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total</p>
                        <p>Tax (18%)</p>
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>$20</p>
                        <p>$20</p>
                        <p>$330.00</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>




























{{--<html>--}}
{{--<head>--}}
{{--<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">--}}
{{--<link rel="shortcut icon" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/favicon.png">--}}
{{--<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap"--}}
{{--      rel="stylesheet">--}}

{{--<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/fontawesome.min.css')}}">--}}
{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/all.min.css')}}">--}}

{{--<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/owl.carousel.min.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/select2.min.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/dragula.min.css')}}">--}}

{{--<link rel="stylesheet"--}}
{{--      href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">--}}

{{--<link rel="stylesheet" href="{{asset('assets/css/template-css.css')}}">--}}
{{--</head>--}}
{{--<body style="width: 1000px;">--}}
{{--    <div class="page-content container content" style="width: 600px">--}}
{{--        <div class="page-header text-blue-d2">--}}
{{--            <h1 class="page-title text-secondary-d1">--}}
{{--                Invoice--}}
{{--                <small class="page-info">--}}
{{--                    <i class="fa fa-angle-double-right text-80"></i>--}}
{{--                    ID: #111-222--}}
{{--                </small>--}}
{{--            </h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card" style="background: azure;">--}}
{{--            <div class="card-header">--}}
{{--                <div class="container px-0">--}}
{{--                    <div class="row mt-4">--}}
{{--                        <div class="col-12 col-lg-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="text-center text-150">--}}
{{--                                        <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>--}}
{{--                                        <h2 class="d-inline"><span class="text-default-d3">Maynuddin POS SYSTEM</span>--}}
{{--                                        </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- .row -->--}}

{{--                            <hr class="row brc-default-l1 mx-n1 mb-4"/>--}}

{{--                            <div class="row bg-gradient-cyan">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div>--}}
{{--                                        <span class="text-sm text-grey-m2 align-middle">To:</span>--}}
{{--                                        <span--}}
{{--                                            class="text-600 text-110 text-blue align-middle">{{$purchase->supplier->name}}</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-grey-m2">--}}
{{--                                        <div class="my-1">--}}
{{--                                            {{$purchase->supplier->address}}--}}
{{--                                        </div>--}}
{{--                                        <div class="my-1">--}}
{{--                                            {{$purchase->supplier->city_id}}--}}
{{--                                            , {{$purchase->supplier->country_id}}--}}
{{--                                        </div>--}}
{{--                                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i>--}}
{{--                                            <b class="text-600">{{$purchase->supplier->phone}}</b></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}

{{--                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">--}}
{{--                                    <hr class="d-sm-none"/>--}}
{{--                                    <div class="text-grey-m2">--}}
{{--                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">--}}
{{--                                            Invoice--}}
{{--                                        </div>--}}

{{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span--}}
{{--                                                class="text-600 text-90">ID:</span> #{{$purchase->id}}</div>--}}

{{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span--}}
{{--                                                class="text-600 text-90">Issue Date:</span>--}}
{{--                                            {{$purchase->purchase_payment->created_at->format('d M y')}}</div>--}}

{{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span--}}
{{--                                                class="text-600 text-90">Status:</span> <span--}}
{{--                                                class="badge badge-warning badge-pill px-25">Unpaid</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="table-responsive">--}}
{{--                                            <table class="table">--}}
{{--                                                <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>Product Name</th>--}}
{{--                                                    <th>QTY</th>--}}
{{--                                                    <th>Brand</th>--}}
{{--                                                    <th>Color</th>--}}
{{--                                                    <th>Size</th>--}}
{{--                                                    <th>Purchase Price</th>--}}
{{--                                                    <th class="text-end">Sub Total</th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody id="append-row" class="append-row">--}}
{{--                                                @forelse($purchase->purchase_details as $item)--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="productimgname">--}}
{{--                                                            <a class="product-img">--}}
{{--                                                                <img--}}
{{--                                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg"--}}
{{--                                                                    alt="product">--}}
{{--                                                            </a>--}}
{{--                                                            <a href="javascript:void(0);">{{$item->product->name}}</a>--}}
{{--                                                        </td>--}}
{{--                                                        <td>{{$item->qty}}</td>--}}
{{--                                                        <td>{{$item->brand->name}}</td>--}}
{{--                                                        <td>{{$item->color->name}}</td>--}}
{{--                                                        <td>{{$item->size->name}}</td>--}}
{{--                                                        <td><span>৳ {{$item->purchase_price}}</span>--}}
{{--                                                        </td>--}}
{{--                                                        <td class="text-end">--}}
{{--                                                            <span>৳ {{$item->qty*$item->purchase_price}}</span>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @empty--}}
{{--                                                @endforelse--}}

{{--                                                </tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td colspan="6" class="text-end"><h4>Grand Total :</h4></td>--}}
{{--                                                    <td colspan="2" class="text-center"><h5 id="grand_total">৳ {{$total}}</h5>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/jquery/jquery.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/feather.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/jquery.slimscroll.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/datatables/datatables.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/select2/js/select2.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/moment.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/apexchart/apexcharts.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/apexchart/chart-data.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/owlcarousel/owl.carousel.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/fileupload/fileupload.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/sweetalert/sweetalerts.min.js"></script>--}}
{{--    <script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/script.js"></script>--}}
{{--    --}}{{--modal js--}}
{{--    <script src="assets/js/jquery-1.11.1.min.js"></script>--}}
{{--    <script src="assets/bootstrap/js/bootstrap.min.js"></script>--}}
{{--    <script src="assets/js/jquery.backstretch.min.js"></script>--}}
{{--    <script src="assets/js/scripts.js"></script>--}}
{{--</body>--}}
{{--</html>--}}
