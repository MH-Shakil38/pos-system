<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public const TABLE = "suppliers";

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'supplier_code',
        'logo',
        'contact',
        'email',
        'address',
        'details',
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

    public function purchases(){
        return $this->hasMany(Purchase::class);
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
}
