<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'parent_id',
        'description',
        'isActive',
        'created_by',
    ];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Automatic created_by value assigned from logged in user
     * */

    protected static function boot(){
        parent::boot();

        static::creating(function ($query){
            $query->created_by = auth()->id();
        });
    }

    public static function getAll($is_pluck =false, $order_by_col_name = "id")
    {
        $query = self::query();
        $query->with("user")->latest($order_by_col_name);

        return $is_pluck ? $query->pluck("name","id") : $query->cursor();
    }


    public static function findById($id)
    {

        return self::query()->findOrFail($id);
    }
}
