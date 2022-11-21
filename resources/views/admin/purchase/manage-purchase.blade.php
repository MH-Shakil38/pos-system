@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endsection
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Add</h4>
            <h6>Create new product</h6>
        </div>
    </div>
    {{ Form::open(['route'=>['admin.purchase.store'],"method"=>"POST","files"=>true]) }}
    <div class="card">
        <div class="card-body">
            <div class="row" data-select2-id="20">
                <div class="col-lg-3 col-sm-6 col-12" data-select2-id="14">
                    <div class="form-group" data-select2-id="13">
                        <label>Supplier Name</label>
                        <div class="row" data-select2-id="12">
                            <div class="col-lg-10 col-sm-10 col-10" data-select2-id="11">
                                {!! Form::select('supplier_id',$suppliers,null, ['class'=>'form-control select2','id'=>'supplier','placeholder'=>'Select Supplier','onchange'=>'supplierdata(this)']) !!}
                            </div>
                            <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                <div class="add-icon">
                                    <a href="javascript:void(0);"><img
                                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Purchase Date </label>
                        <div class="input-groupicon">
                            <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="date" value="{{date(now())}}">
                            <div class="addonset">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/calendars.svg"
                                    alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Reference No.</label>
                        <input type="text" name="ref_no" value="Ref-{{rand(0,9999)}}">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <div class="input-groupicon">
                            {!! Form::select(null,$products,null, ['class'=>'form-control select2','id'=>'product','placeholder'=>'Select Product']) !!}
                            {{--                            <input type="text" class="select2" placeholder="Scan/Search Product by code and select...">--}}
                            <div class="addonset">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/scanners.svg"
                                    alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-6 ">
                    <div class="form-group">
                        <label>Category</label>
                        {!! Form::select(null,$categories,null, ['class'=>'form-control select2','id'=>'category','placeholder'=>'Select Category']) !!}
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                    <div class="form-group">
                        <label>Brand</label>
                        {!! Form::select(null,$brands,null, ['class'=>'form-control select2','id'=>'brand','placeholder'=>'Select Brand']) !!}
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                    <div class="form-group">
                        <label>Color</label>
                        {!! Form::select(null,$colors,null, ['class'=>'form-control select2','id'=>'color','placeholder'=>'Select Color']) !!}
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                    <div class="form-group">
                        <label>Size</label>
                        {!! Form::select(null,$sizes,null, ['class'=>'form-control select2','id'=>'size','placeholder'=>'Select Size']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Origin</label>
                        {!! Form::select(null,$origins,null, ['class'=>'form-control select2','id'=>'origin','placeholder'=>'Select Origin']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" id="qty" class="form-control" name="qty" placeholder="Ex: 22">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Purchase Price</label>
                        <input type="number" id="purchase_price" class="form-control" placeholder="Ex: 22">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="number" id="selling_price" class="form-control" placeholder="Ex: 22">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 mb-3">
                    <a class="btn btn-info" id="add-product">Add to Purchase card</a>
                </div>
            </div>
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
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="append-row" class="append-row">
                            <td colspan="11"><h3 class="text-center">Record Not found</h3></td>

                            </tbody>
                            <tr>
                                <td colspan="9"class="text-end"><h4>Grand Total :</h4></td>
                                <td colspan="2" class="text-center"><h5 id="grand_total">৳ 0</h5></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 float-md-right">
                    <div class="total-order">
                        <div class="card border-top" style="background: aliceblue">
                            <div class="card-header p-1"  style="background: lightseagreen">
                                <h2>Order Payment</h2>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" name="note" rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Payment Type</label>
                                        {!! Form::select('payment_type_id',$paymentTypes,null, ['class'=>'form-control select2','placeholder'=>'Select Category']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select name="status" id="" class="form-control select2-blue select2">
                                            <option value="1">Received</option>
                                            <option value="2">Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Vat</label>
                                            <input type="number" class="form-control" name="vat" placeholder="Ex: 400">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Unit Cost</label>
                                            <input type="number" class="form-control" name="unit_cost"
                                                   placeholder="Ex: 20">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-8 col-lg-8 col-8 text-end">
                                        <h4>Total :</h4>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-4 text-center">
                                        <h4 id="total">৳ 0</h4>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label> Paid Amount</label>
                                            <input type="number" class="form-control text-end" name="paid"
                                                   placeholder="Ex: 20000">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <button class="btn btn-submit btn-lg btn-block me-2" style="width: 390px">
                                                Payment
                                            </button>
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
    {{ Form::close() }}

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.0/js/selectize.min.js"></script>
    <script>
        $(".select2").select2({
            width: 'resolve' // need to override the changed default
        });

        function supplierdata(select) {
            $('#append-row').html('')
            var supplier = select.options[select.selectedIndex].value;
            var old_data = 'true'
            $.ajax({
                url: "{{route('admin.add-purchase-card')}}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    'old_data': old_data,
                    'supplier': supplier,
                },
                success: function (res) {
                    $('#grand_total').html('৳ ' + res.grand_total)
                    $('#total').html('৳ ' + res.grand_total)
                    $('#append-data-table').show();
                    $('#append-row').html(res.success)
                }
            })

        }

        $(document).ready(function () {
            $('#append-data-table').hide();
            $('#add-product').click(function () {
                var supplier = $('#supplier').val();
                var product = $('#product').val();
                var qty = $('#qty').val();
                var category = $('#category').val();
                var brand = $('#brand').val();
                var color = $('#size').val();
                var size = $('#size').val();
                var origin = $('#origin').val();
                var purchase_price = $('#purchase_price').val();
                var selling_price = $('#selling_price').val();
                if (qty > 0) {
                    $.ajax({
                        url: "{{route('admin.add-purchase-card')}}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            'supplier_id': supplier,
                            'product_id': product,
                            'qty': qty,
                            'category_id': category,
                            'brand_id': brand,
                            'color_id': color,
                            'size_id': size,
                            'origin_id': origin,
                            'purchase_price': purchase_price,
                            'selling_price': selling_price,
                        },
                        success: function (res) {
                            $('#grand_total').html('৳ ' + res.grand_total)
                            $('#total').html('৳ ' + res.grand_total)
                            $('#append-data-table').show();
                            $('#append-row').prepend(res.card_row);
                            $('#total').val(res.total)
                            $('#qty').val(0);
                            // $('#myTable').append('<tr><td>my data</td><td>more data</td></tr>');
                            // $('#resultModalTitle').html(res.title);
                        }
                    });
                }
            })
        });
    </script>
@endsection


