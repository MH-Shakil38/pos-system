<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'supplier_code',
        'logo',
        'contact',
        'email',
        'address',
        'details',
        'created_by',
    ];
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
