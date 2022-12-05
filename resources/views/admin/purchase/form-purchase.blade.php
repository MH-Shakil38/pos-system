<div class="row">
    <div class="col-lg-12 col-sm-12 col-12" data-select2-id="14">
        <div class="form-group" data-select2-id="13">
            <label>Supplier Name</label>
            <div class="row" data-select2-id="12">
                <div class="col-lg-10 col-sm-10 col-10" data-select2-id="11">
                    {!! Form::select('supplier_id',$suppliers,null, ['class'=>'form-control select2','id'=>'supplier','placeholder'=>'Select Supplier','onchange'=>'supplierdata(this)']) !!}
                </div>
                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                    <div class="add-icon">
                        <a href="javascript:void(0);">  <img src="{!! addIconSVG()  !!}" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-sm-6 col-12">
        <div class="form-group">
            <label>Purchase Date </label>
            <div class="input-groupicon">
                <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="date" value="{{date(now())}}">
                <div class="addonset">
                    <img
                        src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/calendars.svg"
                        alt="img">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-6 col-12">
        <div class="form-group">
            <label>Reference No.</label>
            <input type="text" name="ref_no" value="Ref-{{rand(0,9999)}}">
        </div>
    </div>


    <div class="col-lg-12 col-sm-12 col-12">
        <div class="form-group">
            <label>Payment Type</label>
            {!! Form::select('payment_type_id',$paymentTypes,null, ['class'=>'form-control select2','placeholder'=>'Select Category']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="form-group">
            <label> Status</label>
            <select name="status" id="" class="form-control select2-blue select2">
                <option value="1">Received</option>
                <option value="2">Order</option>
            </select>
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
            <label> Vat</label>
            <input type="number" class="form-control" name="vat" placeholder="Ex: 400">
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
            <label> Unit Cost</label>
            <input type="number" class="form-control" name="unit_cost"
                   placeholder="Ex: 20">
        </div>
    </div>

    <div class="col-md-8 col-lg-8 col-8 text-end">
        <h4>Total :</h4>
    </div>
    <div class="col-md-4 col-lg-4 col-4 text-center">
        <h4 id="total">৳ 0</h4>
    </div>
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="form-group">
            <label> Paid Amount</label>
            <input type="number" class="form-control text-end" name="paid"
                   placeholder="Ex: 20000">
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <label>Note</label>
            {{ Form::textarea('note',null,['class'=>'form-control','rows'=>1]) }}
        </div>
    </div>

    <div class="col-lg-12 col-sm-12 col-12">
            <button class="btn btn-submit btn-lg btn-block w-100"> Payment </button>
    </div>
</div>
