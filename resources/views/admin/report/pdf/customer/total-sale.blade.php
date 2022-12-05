<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        /*position: absolute;*/
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr, th, td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
{{--        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#{{$sale_invoice->id}}</span></p>--}}
{{--        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$sale_invoice->ref}}</span></p>--}}
{{--        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{$sale_invoice->date}}</span></p>--}}
    </div>
    <div class="w-50 float-left logo mt-10">
        <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png"><span>Maynuddin.com</span>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Customer Details</th>
            <th class="w-50">Payment Details</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
{{--                    <p><b>Name : </b>{{$sale_invoice->customer->name}}</p>--}}
{{--                    <p><b>Email :</b>{{$sale_invoice->customer->email}}</p>--}}
{{--                    <p><b>Address :</b>{{$sale_invoice->customer->address}}</p>--}}
{{--                    <p><b>Country :</b> {{$sale_invoice->customer->country_id}}</p>--}}
{{--                    <p> <b>Phone</b> : {{$sale_invoice->customer->phone}}</p>--}}
                </div>
            </td>
            <td>
                <div class="box-text">
{{--                    <p><b>Payment Method :</b>{{$sale_invoice->sale_payment->payment_type->name}}</p>--}}
{{--                    <p><b>Due            :</b> BDT {{$sale_invoice->sale_payment->total - $sale_invoice->sale_payment->paid}}</p>--}}
{{--                    <p><b>Total          :</b> BDT {{$sale_invoice->sale_payment->total}}</p>--}}
{{--                    <p><b>Paid           :</b> BDT {{$sale_invoice->sale_payment->paid}}</p>--}}
{{--                    <p><b>Deliver Date   :</b></p>--}}
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
{{--            <td>{{$sale_invoice->sale_payment->name}}</td>--}}
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-45">Product Name</th>
            <th class="w-30">Price</th>
            <th class="w-30">Qty</th>
            <th class="w-40">Color</th>
            <th class="w-40">Size</th>
            <th class="w-40">Brand</th>
            <th class="w-40">Sub Total</th>
        </tr>
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Total</p>
                        <p>Paid</p>
                        <p style=" margin-top: 5px;padding-top: 7px">Due</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
{{--                        <p>BDT {{$sale_invoice->sale_payment->total}}</p>--}}
{{--                        <p>BDT {{$sale_invoice->sale_payment->paid}}</p>--}}
{{--                        <p style="border-top: 1px solid black; margin-top: 5px;padding-top: 7px">BDT {{$sale_invoice->sale_payment->total - $sale_invoice->sale_payment->paid}}</p>--}}
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
