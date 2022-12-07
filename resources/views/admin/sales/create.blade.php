@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4 onclick="fun()">Add Sale</h4>
            <h6>Add your new sale</h6>
        </div>
    </div>
    {{ Form::open(['route'=>['admin.sale.store'],"method"=>"POST","files"=>true]) }}
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header p-0">
                    <h2 class="rounded" style="background: lightseagreen; padding:3px">Product Add</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6 mt-1">
                            <label for="">Customer</label>
                            <div class="row">
                                <div class="col-md-10 col-sm-10 col-lg-10 col-10">
                                    <div class="form-group">
                                        {!! Form::select('customer_id',$customers,null, ['class'=>'form-control select2','placeholder'=>'Select Customer','id'=>'customer_id','onchange'=>'customer(this)']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-1 col-sm-1 col-1 ps-0">
                                    <div class="add-icon">
                                        <a href="{{route('admin.customer.create.blade.php')}}" target="_blank"><span><img
                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg"
                                                    alt="img"></span></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <label for="">Order Date</label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="order_date" value="{{date(now())}}">
                                    <div class="addonset">
                                        <img
                                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/calendars.svg"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <label for="">Ref</label>
                                <input type="text" name="ref" value="{{'SL'.rand(0,9999)}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-12">
                            <div class="form-group">
                                <label for="">Product</label>
                                <select id="product_id" name="product_id" class="form-control select2"
                                        onchange="choice1(this)">
                                    <option disabled selected>Select Product</option>
                                    @forelse( $purchases as $p)
                                        <option id="product{{$p->product->id}}"
                                                value="{{$p->product->id}}">{{$p->product->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12">
                            <div class="form-group">
                                <label for="">Brand</label>
                                {!! Form::select(null,$brands,Null, ['class'=>'form-control select2','placeholder'=>'brand','id'=>'brand_id']) !!}

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Color</label>
                                {!! Form::select(null,$colors,Null, ['class'=>'form-control select2','placeholder'=>'color','id'=>'color_id']) !!}

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Size</label>
                                {!! Form::select(null,$sizes,Null, ['class'=>'form-control select2','placeholder'=>'size','id'=>'size_id']) !!}

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input id="disable_price" class="form-control" disabled type="number" value="">
                                <input id="price" class="form-control" type="hidden" value="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input id="qty" name="qty" type="text" disabled="true">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12 ps-0">
                            <div class="form-group">
                                <label for="">SubTotal</label>
                                <input value="" id="disablesubtotal" disabled="true" class="form-control">
                                <input type="hidden" value="" id="subtotal" disabled="true">
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="form-group">
                                <div id="add-product">
                                    <a class="btn btn-info" id="add-product">
                                        Add Sale Card
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id=""></div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th class="text-end">Sub Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="append-row" class="append-row">
                        <td colspan="11"><h3 class="text-center">Record Not found</h3></td>

                        </tbody>
                        <tr>
                            <td colspan="6"class="text-end"><h4>Grand Total :</h4></td>
                            <td colspan="4" class="text-center"><h5 id="total">৳ 0</h5></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header p-0">
                    <div class="card-header p-0"><h2 class="rounded" style="background: lightseagreen; padding:3px">
                            Payments</h2></div>
                </div>
                <div class="card-body">
                    <div class="box-2">
                        <div class="box-inner-2">
                            <form action="">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <p class="fw-bold">Payment Details</p>
                                            <div class="mb-3" id="append-customer">

                                            </div>
                                            <hr>
                                            <div class="d-flex flex-column dis">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <strong class="float-left">Total</strong>
                                                    <p class="fw-bold">৳ <span class="grand-total"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="address">
                                            <label for="">Payment Type</label>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-12 ps-0">
                                                {!! Form::select('paymentType',$paymentTypes,1, ['class'=>'form-control select2','placeholder'=>'Payment Type']) !!}
                                            </div>
                                            <Label>Note</Label>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-12 ps-0">
                                                <textarea name="note" id="" cols="30" rows="2"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <div class="input-groupicon">
                                                        <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="deliver_date" value="{{date(now())}}">
                                                        <div class="addonset">
                                                            <img
                                                                src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/calendars.svg"
                                                                alt="img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-12 ps-0">
                                                <label for="">Paid Amount</label>
                                                <div class="form-group">
                                                    <input type="number" name="total_paid" class="text-end form-control">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column dis">
                                                <button class="btn btn-primary mt-2">Order
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2({
            width: 'resolve' // need to override the changed default
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function choice1(select) {
            $('#subtotal').val(0)
            $('#disablesubtotal').val(0)
            $('#qty').val(0)
            var select_product = 'true'
            var p_query = select.options[select.selectedIndex].value;
            $.ajax({
                url: "{{route('admin.add-product')}}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    'p_query': p_query,
                    'select_product': select_product
                },
                success: function (res) {
                    $('#disable_price').val(res.price)
                    $('#price').val(res.price)
                    $('#qty').prop('disabled', false);
                }
            })

        }

        function customer(select) {
            $('#append-row').html('')
            var customers = select.options[select.selectedIndex].value;
            $.ajax({
                url: "{{route('admin.add-product')}}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    'customers': customers,
                },
                success: function (res) {
                    $('#append-row').html(res.success)
                    $('#append-customer').html(res.customer)
                    $('.grand-total').html(res.total)
                    $('#total').html(res.total)
                }
            })

        }

        $("#qty").keyup(function () {
            var qty = $(this).val()
            var price = $('#price').val()
            var total = qty * price
            $('#subtotal').val(total)
            $('#disablesubtotal').val(total)
        });
        $('#add-product').click(function () {
            var product_id = $('#product_id').val();
            var qty = $('#qty').val();
            var customer_id = $('#customer_id').val();
            var brand_id = $('#brand_id').val();
            var color_id = $('#color_id').val();
            var size_id = $('#size_id').val();
            var selling_price = $('#price').val();
            if (qty > 0) {
                $.ajax({
                    url: "{{route('admin.add-product')}}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'product_id': product_id,
                        'brand_id': brand_id,
                        'color_id': color_id,
                        'size_id': size_id,
                        'qty': qty,
                        'customer_id': customer_id,
                        'selling_price':selling_price,
                    },
                    success: function (res) {
                        $('#append-row').prepend(res.success)
                        $('.grand-total').html(res.total)
                        $('#total').html(res.total)
                        if (res.alertMessage) {
                            alert(res.alertMessage)
                        }
                    }
                })
            }
        })
    </script>
@endsection
