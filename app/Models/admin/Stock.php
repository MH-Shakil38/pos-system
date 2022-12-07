<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'origin_id',
        'category_id',
        'stock_in',
        'stock_out',
        'created_by'
    ];


    protected static function boot(){
        parent::boot();

        static::creating(function ($query){
            $query->created_by = auth()->id();
        });
    }

    /**
     *  stock manage method start
     *  param 1: $val contain all need stock table information
     *  param 2: $stockIn_or_stockOut_column contain stock table column name
     *  note: if $stockIn_or_stockOut_column value stock_in than update or insert stock_in column,
     *  if find stock_out update or insert stock out column
     */

    public static function stockManage($payloads, $stockIn_or_stockOut_column = 'stock_in'){
        $query = Stock::query()
            ->where([
                'product_id'    => $payloads['product_id'],
                'color_id'      => $payloads['color_id'],
                'size_id'       => $payloads['size_id'],
                'origin_id'     => $payloads['origin_id'],
                'category_id'   => $payloads['category_id']
            ]);

        if ($query->exists()) {
            $stock_in = $query->first();
            return self::query()->where('id',$stock_in->id)
                ->update([$stockIn_or_stockOut_column=> $payloads['qty'] + $stock_in->stock_in]);
        }else{
            return self::query()->create([
                'product_id'    => $payloads['product_id'],
                'color_id'      => $payloads['color_id'],
                'size_id'       => $payloads['size_id'],
                'origin_id'     => $payloads['origin_id'],
                'category_id'   => $payloads['category_id'],
                $stockIn_or_stockOut_column        => $payloads['qty']
            ]);
        }
    }
    public static function stockOut(){

    }
}
