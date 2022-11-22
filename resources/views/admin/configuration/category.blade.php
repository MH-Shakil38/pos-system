@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn launch-modal" href="#" data-modal-id="modal-register">
            <button type="button" data-modal-id="modal-register"  data-bs-toggle="modal" data-bs-target="#exampleModal"
               class="btn btn-added launch-modal">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg"
                     class="me-1" alt="img">Add Category
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('admin.include.table-header')
            <hr>
            @include('admin.include.success-message')
            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                    <tr class="">
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Category name</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $info)
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td class="productimgname">
                            <a href="javascript:void(0);" class="product-img">
                                <img
                                    src="{{asset($info->thumbnail)}}"
                                    alt="product">
                            </a>
                            <a href="javascript:void(0);">{{$info->name}}</a>
{{--                            <a href="javascript:void(0);">Computers</a>--}}
                        </td>
                        <td> {{$info->description}}</td>
                        <td> {{$info->user->name}}</td>
                        <td>
                            <a class="me-3"
                               href="{{route('admin.category.edit',$info->id)}}">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg"
                                    alt="img">
                            </a>
                            <a class="me-3 confirm-text"  href="{{route('admin.category.destroy',$info->id)}}">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg"
                                    alt="img">
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
    <!-- add category and update category Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title" id="modal-register-label">Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                </div>
                <div class="modal-body">

                    @if(isset($category))
                        {{ Form::model($category,['route'=>['admin.category.update',$category->id],"method"=>"PATCH","files"=>true]) }}
                    @else
                        {{ Form::open(['route'=>['admin.category.store'],"method"=>"POST","files"=>true]) }}
                    @endif
                    <div class="form-group">
                        <label for="name">Title/Name</label>
                        <input name="name" type="text" class="form-control"
                               value="{{isset($category) ? $category->name : ''}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select File</label><br>
                        @if(isset($category->thumbnail))
                            <img class="mb-2" src="{{asset($category->thumbnail)}}" alt="No Image">
                        @endif
                        <input class="form-control-file" name="thumbnail" type="file">
                        @error('thumbnail')
                        <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Parent <small>(optional)</small> </label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="" disabled selected>Select Parent</option>
                            @forelse($categories_orderBy as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description<small>(optional)</small></label><br>
                        <textarea class="form-control" name="description" id="" rows="3"
                                  style="width: 100%">{{isset($category) ? $category->description : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    {{ Form::close() }}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
            $("#input-b5").fileinput({showCaption: false, dropZoneEnabled: false});
        });
    </script>
@endsection
