<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetalis extends Model
{
    use HasFactory;
    protected $table = 'sale_details';
    protected $fillable = [
        'sale_id',
        'product_id',
        'qty',
        'size_id',
        'category_id',
        'origin_id',
        'brand_id',
    ];
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
