<?php

namespace App\Models;

use App\Models\admin\Product;
use App\Models\admin\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCard extends Model
{
    use HasFactory;
    protected $table='purchase_cards';
    protected $fillable = [
      'supplier_id',
      'purchase_id',
      'product_id',
      'brand_id',
      'color_id',
      'size_id',
      'origin_id',
      'qty',
      'purchase_price',
      'selling_price',
      'total',
    ];
    public function supplier(){
       return $this->belongsTo(Supplier::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function origin(){
        return $this->belongsTo(Origin::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
}
