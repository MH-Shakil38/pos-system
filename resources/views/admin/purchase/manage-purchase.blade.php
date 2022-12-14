@extends('admin.layouts.master')

@section('title',"Manage New Purchase")
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Add</h4>
            <h6>Create new product</h6>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>QTY</th>
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
                        <td colspan="9" class="text-end"><h4>Grand Total :</h4></td>
                        <td colspan="2" class="text-center"><h5 id="grand_total">৳ 0</h5></td>
                    </tr>
                </table>
            </div>
            </div>

            {{-- Khali 6--}}
            <div class="col-lg-7"></div>

            <div class="col-lg-5">
                <div class="card border-top" style="background: aliceblue">
                    <div class="card-header p-1"  style="background: lightseagreen">
                        <h2>Order Payment</h2>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route'=>['admin.purchase.store'],"method"=>"POST","files"=>true]) }}
                            @include("admin.purchase.form-purchase")
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{ Form::open(['route'=>['admin.purchase.store'],"method"=>"POST","files"=>true]) }}
        @include('admin.purchase.add_to_card_form')
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
                            $('#append-row').append(res.card_row);
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

@section('css')

@endsection


