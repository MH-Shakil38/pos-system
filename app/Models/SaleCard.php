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
      'brand_id',
      'color_id',
      'size_id',
      'selling_price',
      'total_price',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
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

    /**
     * Repository Methods Start
     * */

    public static function sumByCustomerID($customer_id)
    {

        return self::query()
            ->where('customer_id', "=", $customer_id)
            ->sum('total_price') ?? 0;

    }



}
