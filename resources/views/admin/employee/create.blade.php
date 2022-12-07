@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        @include('admin.include.page_header',
                    ['header_name'=>'Create Employee',
                    'title'=>'create employee',
                    'route'=>'admin.employee.index',
                    'button_name'=>'Employee List'])
    </div>
    <hr>
    @if ($errors->any())
        <ul class="mt-3 list-none list-inside text-sm text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="card-body">
        <div class="row">
            {!! Form::open(['route'=>'admin.employee.store','method'=>'POST']) !!}
            <div class="row">
                <div class="col-md-12">
                    <h3>User Info</h3>
                </div>
                <hr>
                <div class="col-md-3">
                    <label for="">Name</label>
                    <div class="form-group">
                        {!! Form::text('name',false,['class'=>'form-control','placeholder'=>'Ex: Maynuddin']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Email</label>
                    <div class="form-group">
                        {!! Form::email('email',false,['class'=>'form-control','placeholder'=>'Ex: maynuddin@gmail.com']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for=""><b>Password</b></label>
                    <div class="form-group">
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'***********']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Emaployee Info</h3>
                </div>
                <div class="col-md-3">
                    <label for=""><b>Phone</b></label>
                    <div class="form-group">
                        {!! Form::number('phone',false,['class'=>'form-control','placeholder'=>'Ex: 01835193038']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for=""><b>NID</b></label>
                    <div class="form-group">
                        {!! Form::number('nid',false,['class'=>'form-control','placeholder'=>'Employee NID']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Present Address</label>
                    <div class="form-group">
                        {!! Form::text('present_address',false,['class'=>'form-control','placeholder'=>'Present Address']) !!}

                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Permanent Address</label>
                    <div class="form-group">
                        {!! Form::text('permanent_address',false,['class'=>'form-control','placeholder'=>'Permanent Address']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Joining date</label>
                    <div class="form-group">
                        {!! Form::date('joining_date',\Carbon\Carbon::now()->format('Y-m-d\TH:i:s'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Joining Salary</label>
                    <div class="form-group">
                        {!! Form::number('joining_salary',false,['class'=>'form-control','placeholder'=>'EX: 30,000 BDT']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Product Image</label>
                        <div class="image-upload">
                            <input type="file" name="image" multiple>
                            <div class="image-uploads">
                                <img
                                    src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg"
                                    alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
