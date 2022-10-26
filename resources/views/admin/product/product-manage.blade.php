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
                     class="me-1" alt="img">Add Product
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('admin.include.table-header')
            @include('admin.include.success-message')
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
                        <th>Product</th>
                        <th>Details</th>
                        <th>Product Code</th>
                        <th>SKU NO</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $info)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="{{asset($info->thumbnail)}}" alt="product">
                                </a>
                                <a href="javascript:void(0);">{{$info->name}}</a>
                            </td>
                            <td>{{$info->details}}</td>
                            <td>{{$info->product_code}}</td>
                            <td>{{$info->sku_no}}</td>
                            <td>{{$info->stock}}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.product.edit', [$info->id]) }}"
                                   class="btn btn-sm btn-primary mr-1" style="margin-right: 5px"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.product.destroy', [$info->id]) }}" class="mr-1"
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
                    <h3 class="modal-title" id="modal-register-label">Product Create</h3><br>
                </div>
                <div class="modal-body">
                    @if(isset($product))
                        {{ Form::model($product,['route'=>['admin.product.update',$product->id],"method"=>"PATCH","files"=>true]) }}
                    @else
                        {{ Form::open(['route'=>['admin.product.store'],"method"=>"POST","files"=>true]) }}
                    @endif
                    <div class="row bg-gradient-cyan ">
                        <div class="row container">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="name">Title/Name</label>
                                            <input name="name" type="text" class="form-control" value="{{isset($product) ? $product->name : ''}}">
                                            @error('name')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="thumbnail">Product Thumbnail</label>
                                            @if(isset($product->thumbnail))
                                                <img class="mb-2" src="{{asset($product->thumbnail)}}" alt="No Image">
                                            @endif
                                            <input class="form-control" name="thumbnail" type="file">
                                            @error('thumbnail')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="">Details</label>
                                            <textarea class="form-control" name="details" id="" rows="2" style="width: 100%">{{ $product->details ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number" class="form-control" name="price" value="{{ $product->price ?? ''}}" placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="btn btn-primary form-control">{{ isset($product) ? 'Update' : 'Save'}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{ Form::close() }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Close</button>
                </div>
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


