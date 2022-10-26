@extends('admin.layouts.master')
@section('title')
    POS-SYSTEM | PRODUCT CREATE PAGE
@endsection
@section('css')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-gradient-lightblue">
            <h3>Product Create</h3>
        </div>
        @if(Session::has('success'))
            <p class="alert alert-info">{{ Session::get('success') }}</p>
        @endif
        @if(isset($product))
            {{ Form::model($product,['route'=>['admin.product.update',$product->id],"method"=>"PATCH","files"=>true]) }}
        @else
            {{ Form::open(['route'=>['admin.product.store'],"method"=>"POST","files"=>true]) }}
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input name="name" type="text" class="form-control"
                               value="{{isset($product) ? $product->name : ''}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Category </label>
                        {{ Form::select("categories[]",$categories,null,["class"=>"form-control js-example-basic-multiple","multiple"]) }}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Thumbnail</label><br>
                        @if(isset($product->thumbnail))
                            <img class="mb-2" src="{{asset($product->thumbnail)}}" alt="No Image">
                        @endif
                        <input class="form-control-file" name="thumbnail" type="file">
                        @error('thumbnail')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Picture</label><br>
                        {{--                        @if(isset($product->thumbnail))--}}
                        {{--                            <img class="mb-2" src="{{asset($product->thumbnail)}}" alt="No Image">--}}
                        {{--                        @endif--}}
                        <input class="form-control-file" name="picture" type="file">
                        @error('picture')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description<small>(optional)</small></label><br>
                        <textarea class="form-control" name="description" id="" rows="3"
                                  style="width: 100%">{{isset($product) ? $product->details : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Title/Name</label>
                        <input name="name" type="text" class="form-control"
                               value="{{isset($product) ? $product->name : ''}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            ...
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description<small>(optional)</small></label><br>
                        <textarea class="form-control" name="description" id="" rows="3"
                                  style="width: 100%">{{isset($product) ? $product->details : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection


