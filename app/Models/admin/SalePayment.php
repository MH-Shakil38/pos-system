<?php

namespace App\Models\admin;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    use HasFactory;
    protected $table = 'sale_payments';
    protected $fillable = [
        'sale_id',
        'payment_type_id',
        'total',
        'paid',
        'due',
    ];
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function payment_type(){
        return $this->belongsTo(PaymentType::class);
    }
}
