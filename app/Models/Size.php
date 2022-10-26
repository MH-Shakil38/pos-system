<?php

namespace App\Models;

use App\Models\admin\PurchaseDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable =
        [
            'name',
            'slug',
            'thumbnail',
            'description',
            'created_by',
        ];
    public function purchase_details(){
        return $this->hasMany(PurchaseDetails::Class);
    }
}
