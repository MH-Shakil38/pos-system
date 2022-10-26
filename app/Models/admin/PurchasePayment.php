<?php

namespace App\Models\admin;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    use HasFactory;
    protected $table = 'purchase_payments';
    protected $fillable = [
        'payment_type_id',
        'purchase_details_id',
        'total_price',
        'selling_price'
    ];
    public function payment_types(){
        return $this->belongsTo(PaymentType::class);
    }
    public function purchase_details(){
        return $this->belongsTo(PurchaseDetails::class);
    }
}
