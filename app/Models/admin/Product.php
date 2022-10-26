<?php

namespace App\Models\admin;

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
      'stock',
      'created_by',
    ];
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
