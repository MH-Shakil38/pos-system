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
        'purchase_id',
        'payment_type_id',
        'total',
        'paid',
        'due',
        'status',
        'note',
    ];
    public function payment_types(){
        return $this->belongsTo(PaymentType::class);
    }
    public function purchase_details(){
        return $this->belongsTo(PurchaseDetails::class);
    }
}
