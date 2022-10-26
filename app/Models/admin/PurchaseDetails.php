<?php

namespace App\Models\admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Origin;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $table = 'purchase_details';
    protected $fillable = [
        'purchase_id',
        'qty',
        'category_id',
        'brand_id',
        'color_id',
        'origin_id',
        'size_id',
    ];
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function origin(){
        return $this->belongsTo(Origin::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
