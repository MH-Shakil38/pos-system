@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="bg-gradient-lightblue p-2 rounded">Color Create</h2>
                        <hr>
                        @if(Session::has('success'))
                            <p class="alert alert-info">{{ Session::get('success') }}</p>
                        @endif
                        @if(isset($color))
                            {{ Form::model($color,['route'=>['admin.color.update',$color->id],"method"=>"PATCH","files"=>true]) }}
                        @else
                            {{ Form::open(['route'=>['admin.color.store'],"method"=>"POST","files"=>true]) }}
                        @endif
                        <div class="form-group">
                            <label for="name">Title/Name</label>
                            <input name="name" type="text" class="form-control" value="{{isset($color) ? $color->name : ''}}">
                            @error('name')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select File</label><br>
                            @if(isset($color->thumbnail))
                                <img class="mb-2" src="{{asset($color->thumbnail)}}" alt="No Image">
                            @endif
                            <input class="form-control-file" name="thumbnail" type="file">
                            @error('thumbnail')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description<small>(optional)</small></label><br>
                            <textarea class="form-control" name="description" id="" rows="3" style="width: 100%">{{isset($color) ? $color->description : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">{{isset($color) ? 'Update' : 'Save'}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="bg-gradient-lightblue p-2 rounded">color List</h2>
                        @if(Session::has('delete'))
                            <p class="alert alert-info">{{ Session::get('delete') }}</p>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($colors as $info)
                                <tr>
                                    <td><strong>{{$info->id}}</strong></td>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->description}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.color.edit', [$info->id]) }}" class="btn btn-sm btn-primary mr-1"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.color.destroy', [$info->id]) }}" class="mr-1"
                                              method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></button>
                                        </form>
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
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $("#input-b5").fileinput({showCaption: false, dropZoneEnabled: false});
        });
    </script>
@endsection
