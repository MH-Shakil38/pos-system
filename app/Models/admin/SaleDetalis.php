<?php

namespace App\Models\admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
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
        'selling_price',
    ];
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
