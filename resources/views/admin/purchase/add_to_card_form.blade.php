<div class="card">
    <div class="card-body">
        <div class="row" data-select2-id="20">

            <div class="col-lg-12 col-sm-6 col-12">
                <div class="form-group">
                    <label>Product Name</label>
                    <div class="input-groupicon">
                        {!! Form::select(null,$products,null, ['class'=>'form-control select2','id'=>'product','placeholder'=>'Select Product']) !!}
                        {{--                            <input type="text" class="select2" placeholder="Scan/Search Product by code and select...">--}}
                        <div class="addonset">
                            <img
                                src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/scanners.svg"
                                alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                <div class="form-group">
                    <label>Brand</label>
                    {!! Form::select(null,$brands,null, ['class'=>'form-control select2','id'=>'brand','placeholder'=>'Select Brand']) !!}
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                <div class="form-group">
                    <label>Color</label>
                    {!! Form::select(null,$colors,null, ['class'=>'form-control select2','id'=>'color','placeholder'=>'Select Color']) !!}
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 ps-0">
                <div class="form-group">
                    <label>Size</label>
                    {!! Form::select(null,$sizes,null, ['class'=>'form-control select2','id'=>'size','placeholder'=>'Select Size']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Origin</label>
                    {!! Form::select(null,$origins,null, ['class'=>'form-control select2','id'=>'origin','placeholder'=>'Select Origin']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" id="qty" class="form-control" placeholder="Ex: 22">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Purchase Price</label>
                    <input type="number" id="purchase_price" class="form-control" placeholder="Ex: 22">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Selling Price</label>
                    <input type="number" id="selling_price" class="form-control" placeholder="Ex: 22">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12 mb-3">
                <a class="btn btn-info" id="add-product">Add to Purchase card</a>
            </div>
        </div>
    </div>
</div>
