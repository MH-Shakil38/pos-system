<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $fillable = [
        'supplier_id',
        'ref',
        'status',
        'date',
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


    protected static function boot(){
        parent::boot();

        static::creating(function ($query){
            $query->created_by = auth()->id();
        });
    }
    public static function storePurchase($purchase){
        return self::query()->create([
            'supplier_id'=>$purchase['supplier_id'],
            'status'=>$purchase['status'],
            'date'=>$purchase['date'],
        ]);

    }
}
