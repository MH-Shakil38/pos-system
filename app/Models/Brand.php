<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable =
        [
            'name',
            'slug',
            'thumbnail',
            'description',
            'created_by',
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

    /**
     * Repository Methods
     * */

    public static function getAll($is_pluck =false)
    {
        $query = self::query();
        $query->latest();

        return $is_pluck ? $query->pluck("name","id") : $query->cursor();
    }


    public static function findById($id)
    {

        return self::query()->findOrFail($id);
    }


}
