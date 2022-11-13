<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    use HasFactory;
    protected $table = 'sale_payments';
    protected $fillable = [
        'sale_id',
        'payment_type_id',
        'total_paid',
    ];
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}
