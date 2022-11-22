<?php

namespace App\Traits;

use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\PurchasePayment;
use Illuminate\Support\Facades\Auth;

trait PurchaseTrait
{
    public static function storePurhcase($purchase){
        $data['created_by'] = ['created_by' => Auth::user()->id];
        $data['purchase'] = $purchase;
        $purchase_data = array_merge($data['created_by'],$data['purchase']);
        $purchase = Purchase::query()->create($purchase_data);
        return $purchase;
    }

    public static function storePurhcaseDetails($data,$ref){
        $data['purchase_details'] = $data;
        $purchase_details_data = array_merge(['purchase_id'=>$ref],$data['purchase_details']);
        $purchase_details = PurchaseDetails::query()->create($purchase_details_data);
        return $purchase_details;
    }
    public static function storePurhcasePayments($data,$ref){
        $data['purchase_payment'] = $data;
        $purchase_payment_data = array_merge(['purchase_details_id'=>$ref],$data['purchase_payment']);
        $purchase_payment = PurchasePayment::query()->create($purchase_payment_data);
        return $purchase_payment;
    }
}
