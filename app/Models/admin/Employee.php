<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'phone',
        'NID',
        'image',
        'present_address',
        'permanent_address',
        'joining_date',
        'joining_salary',
    ];
    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }


    public static function getAll(){
        return self::query()->with('user')->get();
    }
    public static function store($payload, $user){
        return self::query()->create([
            'user_id'=>$user->id,
            'phone'=>$payload['phone'],
            'NID'=>$payload['nid'],
            'present_address'=>$payload['present_address'],
            'permanent_address'=>$payload['permanent_address'],
            'joining_date'=>$payload['joining_date'],
            'joining_salary'=>$payload['joining_salary']
        ]);
    }
}
