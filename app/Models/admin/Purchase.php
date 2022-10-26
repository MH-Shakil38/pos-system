<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $fillable = [
        'product_id',
        'supplier_id',
        'thumbnail',
        'qty',
        'price',
        'details',
        'status',
        'created_by',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function purchase_detail(){
        return $this->hasOne(PurchaseDetails::class);
    }

}
