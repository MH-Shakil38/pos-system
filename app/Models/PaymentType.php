<?php

namespace App\Models;

use App\Models\admin\Purchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;
    protected $table = 'payment_types';
    protected $fillable =
        [
            'name',
            'slug',
            'thumbnail',
            'description',
            'created_by',
        ];
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

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
