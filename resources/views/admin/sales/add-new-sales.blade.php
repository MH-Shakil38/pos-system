@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4 onclick="fun()">Add Sale</h4>
                <h6>Add your new sale</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                    {{ Form::open(['route'=>['admin.sale.store'],"method"=>"POST","files"=>true]) }}

                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    {!! Form::select('customer_id',$customers,null, ['class'=>'form-control select2','placeholder'=>'Select Customer']) !!}
                                </div>
                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                    <div class="add-icon">
                                        <a href="{{route('admin.customer.create.blade.php')}}" target="_blank"><span><img
                                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg"
                                                    alt="img"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Deliver Date</label>
                            <input type="datetime-local" class="form-control" name="deliverDate">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product</label>
                            <select id="product_id" class="form-control select2">
                                <option disabled selected>Select Product</option>
                                @forelse( $purchases as $p)
                                    <option id="product{{$p->id}}" value="{{$p->id}}">{{$p->product->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Color</label>
                            {!! Form::select('',$colors,null, ['class'=>'form-control select2','placeholder'=>'Select Color','id'=>'color']) !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Size</label>
                            {!! Form::select('',$sizes,null, ['class'=>'form-control select2','placeholder'=>'Select Size','id'=>'size']) !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand</label>
                            {!! Form::select('',$brands,null, ['class'=>'form-control select2','placeholder'=>'Select Brand','id'=>'brand']) !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            {!! Form::select('',$categories,null, ['class'=>'form-control select2','placeholder'=>'Select Category','id'=>'category']) !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Origin</label>
                            {!! Form::select('',$origins,null, ['class'=>'form-control select2','placeholder'=>'Select Origin','id'=>'origin']) !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" id="qty">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="add-icon" id="add-product">
                            <a>
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
            <div class="row" id="append-data-table">
                <div class="table-responsive mb-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Origin</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody id="append-data">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Order Tax</label>
                        <input type="text" disabled style="background-color: #6b7280">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" disabled style="background-color: #6b7280">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Shipping</label>
                        <input type="text">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="" id="" class="form-control">
                            <option value="">In Progress</option>
                            <option value="">Pending...</option>
                            <option value="">Delivered</option>
                            <option value="">Received</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="total-order w-100 max-widthauto m-auto mb-4">
                            {{--                                <ul>--}}
                            {{--                                    <li>--}}
                            {{--                                        <h4>Order Tax</h4>--}}
                            {{--                                        <h5>$ 0.00 (0.00%)</h5>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <h4>Discount </h4>--}}
                            {{--                                        <h5>$ 0.00</h5>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="total-order w-100 max-widthauto m-auto mb-4">
                            <ul>
                                <li>
                                    <h4>Shipping</h4>
                                    <h5>
                                        <h5>$
                                            <input type="number"
                                                   value="0" id="shipping"
                                                   disabled
                                                   style="border:0;font-weight:bold;width: 100px">
                                        </h5>
                                    </h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <h5>$
                                        <input type="number"
                                               value="0" id="total"
                                               name="totol"
                                               style="border:0;font-weight:bold;width: 100px">
                                    </h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2">Submit</button>
                    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(".select2").select2({
            width: 'resolve' // need to override the changed default
        });
        $(document).ready(function () {
            $('#append-data-table').hide();
            $('#add-product').click(function () {
                var id = $('#product_id').val();
                var qty = $('#qty').val();
                var total = $('#total').val();
                var color = $('#color').val();
                var size = $('#size').val();
                var category = $('#category').val();
                var origin = $('#origin').val();
                var brand = $('#brand').val();
                // alert(category)
                if (qty > 0) {
                    $.ajax({
                        url: "{{route('admin.add-product')}}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            'id': id,
                            'qty': qty,
                            'total': total,
                            'color':color,
                            'size':size,
                            'category':category,
                            'origin':origin,
                            'brand':brand,
                        },
                        success: function (res) {
                            $('#append-data-table').show();
                            $('#append-data').append(res.html);
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
