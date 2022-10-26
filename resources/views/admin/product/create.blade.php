@extends('admin.layouts.master')
@section('title')
    POS-System | Product Create
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="bg-gradient-lightblue p-2 rounded">Product Create</h2>
                        <hr>
                        @if(Session::has('success'))
                            <p class="alert alert-info">{{ Session::get('success') }}</p>
                        @endif
                        @if(isset($product))
                            {{ Form::model($product,['route'=>['admin.product.update',$product->id],"method"=>"PATCH","files"=>true]) }}
                        @else
                            {{ Form::open(['route'=>['admin.product.store'],"method"=>"POST","files"=>true]) }}
                        @endif
                        <div class="form-group">
                            <label for="name">Title/Name</label>
                            <input name="name" type="text" class="form-control" value="{{isset($product) ? $product->name : ''}}">
                            @error('name')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Thumbnail</label><br>
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
                            <label for="">Details</label><br>
                            <textarea class="form-control" name="details" id="" rows="2" style="width: 100%">{{ $product->details ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label><br>
                            <input type="number" class="form-control" name="price" value="{{ $product->price ?? ''}}" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">{{ isset($product) ? 'Update' : 'Save'}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="bg-gradient-lightblue p-2 rounded">Product List</h2>
                        <hr>
                        @if(Session::has('delete'))
                            <p class="alert alert-info">{{ Session::get('delete') }}</p>
                        @endif
                        @include('admin.include.table-header')
                        <div class="table-responsive">
                            <table class="table  datanew">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $info)
                                <tr>
                                    <td><strong>{{$info->id}}</strong></td>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->details}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.product.edit', [$info->id]) }}" class="btn btn-sm btn-primary mr-1"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.product.manage', [$info->id]) }}" class="mr-1">
                                            <button class="btn btn-sm btn-info"><span>Manage</span></button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $("#input-b5").fileinput({showCaption: false, dropZoneEnabled: false});
        });
    </script>
@endsection
