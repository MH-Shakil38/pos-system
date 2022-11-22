<?php

namespace App\Models\admin;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public static function storePurchase($purchase , $user){
        return self::query()->create([
            'supplier_id' => $purchase['supplier_id'],
            'status' => $purchase['status'],
            'date' => $purchase['date'],
            'created_by' => $user,
        ]);
    }

}
