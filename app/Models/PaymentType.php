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
}
