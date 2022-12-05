{{--{!! Form::open(['route' => route('admin.xyz'),'method' =>'GET']) !!}--}}
<form action="{{ route('admin.xyz') }}" method="GET">

<div class="row">
    <div class="col-md-3 col-sm-12 col-lg-3 ps-0">
        <label for="">Select Customer</label>
        <div class="form-group">
            {!! Form::select('customer_id',$customers, isset($_GET['customer_id']) && !empty($_GET['customer_id']) ? $_GET['customer_id'] : false,['class'=>'form-control select2','placeholder'=>'All']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-lg-3 ps-0">
        <label for="">From</label>
        <div class="form-group">
            {!! Form::date('from', isset($_GET['from']) && !empty($_GET['from']) ? \Carbon\Carbon::parse($_GET['from'])  : \Carbon\Carbon::now(),['class'=>'form-control select2','placeholder'=>'All Time']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-lg-3 ps-0">
        <label for="">To</label>
        <div class="form-group">
            {!! Form::date('to',isset($_GET['to']) && !empty($_GET['to']) ? \Carbon\Carbon::parse($_GET['to'])  : \Carbon\Carbon::now(),['class'=>'form-control select2','placeholder'=>'All Time']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-lg-3 ps-0 ">
        <label for=""></label>
        <div class="form-group">
            <button class="btn btn-primary ">Filter</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
