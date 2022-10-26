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
    ];
}
