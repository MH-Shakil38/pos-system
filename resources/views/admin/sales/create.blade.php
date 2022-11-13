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
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header p-0">
                    <h2 class="rounded" style="background: lightseagreen; padding:3px">Product Add</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="">Customer</label>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6 ps-0">
                            <div class="form-group">
                                {!! Form::select('customer_id',$customers,null, ['class'=>'form-control select2','placeholder'=>'Select Customer','id'=>'customer_id','onchange'=>'customer(this)']) !!}
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-2 ps-0">
                            <div class="add-icon">
                                <a href="{{route('admin.customer.create')}}" target="_blank"><span><img
                                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg"
                                            alt="img"></span></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 col-sm-2 col-md-2 col-12 ps-0">
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

                        <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input id="disable_price" class="form-control" disabled type="number" value="">
                                <input id="price" name="price" class="form-control" type="hidden" value="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input id="qty" name="qty" type="text" disabled="true">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                            <div class="form-group">
                                <label for="">SubTotal</label>
                                <input value="" id="disablesubtotal" disabled="true" class="form-control">
                                <input type="hidden" value="" id="subtotal" disabled="true">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                            <div class="form-group">
                                <label for="">Action</label>
                                <div class="add-icon" id="add-product">
                                    <a class="btn p-0" id="add-product">
                                        <span>
                                            <img
                                                src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg"
                                                alt="img">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="append-row"></div>
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
                    {{ Form::open(['route'=>['admin.sale.store'],"method"=>"POST","files"=>true]) }}
                    <div class="box-2">
                        <div class="box-inner-2">
                            <form action="">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <p class="fw-bold">Payment Details</p>
                                            <div class="mb-3" id="append-customer">

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
                                            <hr>
                                            <div class="d-flex flex-column dis">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <strong class="float-left">Total</strong>
                                                    <p class="fw-bold">$<span class="grand-total"></span></p>
                                                </div>
                                                <button class="btn btn-primary mt-2">Order
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

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
            if (qty > 0) {
                $.ajax({
                    url: "{{route('admin.add-product')}}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'product_id': product_id,
                        'qty': qty,
                        'customer_id': customer_id,
                    },
                    success: function (res) {
                        $('#append-row').prepend(res.success)
                        $('.grand-total').html(res.total)
                        $('#totalpirce').html(res.total)
                        if (res.alertMessage) {
                            alert(res.alertMessage)
                        }
                    }
                })
            }
        })
    </script>
@endsection
