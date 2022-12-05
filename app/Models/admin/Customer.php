<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
      'name',
      'email',
      'phone',
      'country_id',
      'city_id',
      'address',
      'description',
      'pictures',
      'customer_code',
      'created_by',
    ];
    public function sales(){
        return $this->hasMany(Sale::class);
    }

    /**
     * ###########################################
     * #        Repository Methods Start         #
     * ###########################################
     * */

    public static function getAll($relation = false, $pluck = false){
        $query = self::query();
        ($relation ? $query->with('sales') : $query )->get();
       $data =  ($pluck ? $query->pluck('name','id') : $query->get());
        return $data;

    }
    public static function getById($id, $relation=false){
        $query = self::query()->where('id',$id);
        return ($relation ? $query->with('sales') : $query )->first();
    }
    /**
     * ###########################################
     * #        Repository Methods END           #
     * ###########################################
     * */

}
