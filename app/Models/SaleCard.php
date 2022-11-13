<?php

namespace App\Models;

use App\Models\admin\Product;
use App\Models\admin\Purchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCard extends Model
{
    use HasFactory;
    protected $table = 'sale_cards';
    protected $fillable = [
      'customer_id',
      'product_id',
      'qty',
      'total_price',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
