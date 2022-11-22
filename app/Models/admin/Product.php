<?php

namespace App\Models\admin;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const TABLE = "Products";

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'sku_no',
        'slug',
        'product_code',
        'thumbnail',
        'details',
        'price',
        'stock',
        'created_by'
    ];

    /**
     * Automatic created_by value assigned from logged in user
     * */

    protected static function boot(){
        parent::boot();

        static::creating(function ($query){
            $query->created_by = auth()->id();
        });
    }


    public function purchases_details()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_detail()
    {
        return $this->hasOne(PurchaseDetails::class);
    }

    /**
     * Repository Methods
     * */

    public static function getAll($is_pluck = false, $order_by_id_desc = true)
    {
        $query = self::query();

        ($order_by_id_desc ? $query->latest() : $query->orderBy("id"));

        return $is_pluck ? $query->pluck("name","id") : $query->cursor();
    }


    public static function findById($id)
    {

        return self::query()->findOrFail($id);
    }

    public static function findBySkuNo($sku_no)
    {

        return self::query()
            ->where("sku_no","=",$sku_no)
            ->first();
    }


}
