<?php

namespace App\Models\admin;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';
    protected $fillable = [
        'name',
        'sku_no',
        'slug',
        'product_code',
        'thumbnail',
        'details',
        'price',
        'stock',
        'created_by',
    ];

    public function purchases_details()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_detail()
    {
        return $this->hasOne(PurchaseDetails::class);
    }
}
