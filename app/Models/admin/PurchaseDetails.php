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
        'product_id',
        'qty',
        'category_id',
        'brand_id',
        'color_id',
        'origin_id',
        'size_id',
        'purchase_price',
        'selling_price',
        'total',
    ];
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
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
    public static function storePurchaseDetails($purchase, $card)
    {
        return self::query()->create([
        "purchase_id"       => $purchase->id,
        "product_id"        => $card->product_id,
        "qty"               => $card->qty,
        "category_id"       => $card->category_id,
        "brand_id"          => $card->brand_id,
        "color_id"          => $card->color_id,
        "size_id"           => $card->size_id,
        "origin_id"         => $card->origin_id,
        "purchase_price"    => $card->purchase_price,
        "selling_price"     => $card->selling_price,
        "total"             => $card->total,
        ]);
    }
}
