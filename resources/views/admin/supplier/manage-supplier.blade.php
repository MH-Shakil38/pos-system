@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn launch-modal" href="#" data-modal-id="modal-register">
            <button type="button" data-modal-id="modal-register" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn btn-added launch-modal">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg"
                     class="me-1" alt="img">Add Category
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('admin.include.table-header')
            @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
            <hr>
            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                    <tr class="bg-gradient-gray">
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Serial-No</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($suppliers as $info)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td><strong>{{$loop->iteration}}</strong></td>
                            <td><img height="40px" width="40px" class="me-2 product-img" src="{{asset($info->logo)}}"
                                     alt="table-user"></td>
                            <td>{{$info->name}}</td>
                            <td>{{$info->contact}}</td>
                            <td>{{$info->email}}</td>
                            <td>{{$info->address}}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.supplier.edit', [$info->id]) }}"
                                   class="btn btn-sm btn-primary mr-1"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.supplier.destroy', [$info->id]) }}" class="mr-1"
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
    <!-- add category and update category Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title" id="modal-register-label">Supplier Create</h3>
                    <p>Fill in the form below to get instant access:</p>
                </div>
                <div class="modal-body">
                    @if(isset($supplier))
                        {{ Form::model($supplier,['route'=>['admin.supplier.update',$supplier->id],"method"=>"PATCH","files"=>true]) }}
                    @else
                        {{ Form::open(['route'=>['admin.supplier.store'],"method"=>"POST","files"=>true]) }}
                    @endif
                    <div class="row bg-gradient-cyan ">
                        <div class="card-body">
                            <label for="name">Title/Name</label>
                            <input name="name" type="text" class="form-control"
                                   value="{{isset($supplier) ? $supplier->name : ''}}">
                            @error('name')
                            <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="name">Contact</label>
                            <input name="contact" type="text" class="form-control"
                                   value="{{isset($supplier) ? $supplier->contact : ''}}">
                            @error('contact')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name">Email</label>
                            <input name="email" type="text" class="form-control"
                                   value="{{isset($supplier) ? $supplier->email : ''}}">
                            @error('email')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="control-label">Supplier Logo</label><br>
                            @if(isset($supplier->logo))
                                <img class="" src="{{asset($supplier->logo)}}" alt="No Image">
                            @endif
                            <input class="form-control-file form-control" name="logo" type="file">
                            @error('logo')
                            <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="name">Address</label>
                            <textarea name="address" type="text" class="form-control" rows="2"
                                      value="">{{isset($supplier) ? $supplier->Address : ''}}</textarea>
                            @error('address')
                            <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="">Details</label><br>
                            <textarea class="form-control mb-2" name="details" id="" rows="2"
                                      style="width: 100%">{{ $product->details ?? ''}}</textarea>
                            <button
                                class="btn btn-primary form-control">{{ isset($supplier) ? 'Update' : 'Save'}}</button>
                        </div>
                    </div>
                </div>

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



{{--@extends('admin.layouts.master')--}}
{{--@section('title')--}}
{{--    POS-System | Manage Supplier--}}
{{--@endsection--}}
{{--@section('css')--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="page-header rounded" style="background-color: #6b7280;padding: 5px;">--}}
{{--            <div class="page-title p-1 ">--}}
{{--                <h4 class="text-white">Product Category list</h4>--}}
{{--                <h6 class="text-white">View/Search product Category</h6>--}}
{{--            </div>--}}
{{--            <div class="page-btn launch-modal" href="#" data-modal-id="modal-register">--}}
{{--                <button type="button" data-modal-id="modal-register"  data-bs-toggle="modal" data-bs-target="#exampleModal"--}}
{{--                        class="btn btn-added launch-modal">--}}
{{--                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg"--}}
{{--                         class="me-1" alt="img">Add Supplier--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <h2 class="p-2 rounded">Supplier List</h2>--}}
{{--                @if(Session::has('delete'))--}}
{{--                    <p class="alert alert-info">{{ Session::get('delete') }}</p>--}}
{{--                @endif--}}
{{--                @include('admin.include.table-header')--}}
{{--                <hr>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- add category and update category Modal -->--}}
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}

{{--                <div class="modal-header">--}}
{{--                    <h3 class="modal-title" id="modal-register-label">Sign up now</h3>--}}
{{--                    <p>Fill in the form below to get instant access:</p>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    hello--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <script src="assets/js/jquery-1.11.1.min.js"></script>--}}
{{--    <script src="assets/bootstrap/js/bootstrap.min.js"></script>--}}
{{--    <script src="assets/js/jquery.backstretch.min.js"></script>--}}
{{--    <script src="assets/js/scripts.js"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#datatable').DataTable();--}}
{{--            $("#input-b5").fileinput({showCaption: false, dropZoneEnabled: false});--}}

{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
