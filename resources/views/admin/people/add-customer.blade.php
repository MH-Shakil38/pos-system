@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>Customer Management</h4>
            <h6>Add/Update Customer</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(isset($customer))
                {{ Form::model($customer,['route'=>['admin.customer.update',$customer->id],"method"=>"PATCH","files"=>true]) }}
            @else
                {{ Form::open(['route'=>['admin.customer.store'],"method"=>"POST","files"=>true]) }}
            @endif
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Customer</label>
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Country</label>
                        {!! Form::select('country_id',[1=>'bangladesh'],null, ['class'=>'form-control select2','placeholder'=>'Select Brand']) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>City</label>
                        {!! Form::select('city_id',[1=>'Dhaka',2=>'Chittagong'],null, ['class'=>'form-control select2','placeholder'=>'Select Color']) !!}
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label> Product Image</label>
                        <div class="image-upload">
                            <input type="file" name="pictures" multiple>
                            <div class="image-uploads">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg"
                                    alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2">Submit</button>
                    <a href="{{route('admin.customer.index')}}"
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
