<?php

namespace App\Models\admin;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $fillable = [
        'supplier_id',
        'ref',
        'date',
        'status',
        'created_by',
    ];
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function purchase_details(){
        return $this->hasMany(PurchaseDetails::class);
    }
    public function purchase_payment(){
        return $this->hasOne(PurchasePayment::class);
    }

}
