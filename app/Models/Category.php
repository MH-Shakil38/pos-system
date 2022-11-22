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
}
