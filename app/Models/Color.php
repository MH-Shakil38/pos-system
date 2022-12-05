<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable =
        [
            'name',
            'slug',
            'thumbnail',
            'description',
            'created_by',
        ];

    /**
     * ###########################################
     * #        Repository Methods Start         #
     * ###########################################
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

    /**
     * ###########################################
     * #        Repository Methods END         #
     * ###########################################
     * */

}
