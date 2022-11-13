<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'customer_id',
        'note',
        'status',
        'created_by',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function sale_details(){
        return $this->hasMany(SaleDetalis::class);
    }
    public function sale_payment(){
       return $this->hasOne(SalePayment::class);
    }
}
