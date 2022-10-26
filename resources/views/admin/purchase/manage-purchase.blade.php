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

    <div class="card">
        <div class="card-body">
            @if(isset($category))
                {{ Form::model($category,['route'=>['admin.category.update',$category->id],"method"=>"PATCH","files"=>true]) }}
            @else
                {{ Form::open(['route'=>['admin.purchase.store'],"method"=>"POST","files"=>true]) }}
            @endif
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        {!! Form::select('product_id',$products,null, ['class'=>'form-control select2','placeholder'=>'Select Product']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Supplier</label>
                        {!! Form::select('supplier_id',$suppliers,null, ['class'=>'form-control select2','placeholder'=>'Select Supplier']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Sub Category</label>
                        {!! Form::select('category_id',$categories,null, ['class'=>'form-control select2','placeholder'=>'Select Category']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Brand</label>
                        {!! Form::select('brand_id',$brands,null, ['class'=>'form-control select2','placeholder'=>'Select Brand']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Color</label>
                        {!! Form::select('color_id',$colors,null, ['class'=>'form-control select2','placeholder'=>'Select Color']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Size</label>
                        {!! Form::select('size_id',$sizes,null, ['class'=>'form-control select2','placeholder'=>'Select Size']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Origin</label>
                        {!! Form::select('origin_id',$origins,null, ['class'=>'form-control select2','placeholder'=>'Select Origin']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="qty" placeholder="Ex: 22">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="details"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Payment Type</label>
                        {!! Form::select('payment_type_id',$paymentTypes,null, ['class'=>'form-control select2','placeholder'=>'Select Category']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select class="select" disabled>
                            <option>Percentage / %</option>
                            <option>Amount / tk</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="number" disabled class="form-control" name="discount" placeholder="Ex:2000">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Vat</label>
                        <input type="number" disabled class="form-control" name="vat" placeholder="Ex: 400">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Unit Cost</label>
                        <input type="number" disabled class="form-control" name="unit_cost" placeholder="Ex: 20">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Purchase Price</label>
                        <input type="number" class="form-control" name="total_price" placeholder="Ex: 20">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Selling Price</label>
                        <input type="number" class="form-control" name="selling_price" placeholder="Ex: 20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label> Product Image</label>
                <div class="image-upload">
                    <input type="file" name="pictures[]" multiple>
                    <div class="image-uploads">
                        <img
                            src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg"
                            alt="img">
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-submit me-2">Submit</button>
            <a href="{{route('admin.purchase.index')}}"
               class="btn btn-cancel">Cancel</a>
        </div>
    </div>
    {{ Form::close() }}
    </div>
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


