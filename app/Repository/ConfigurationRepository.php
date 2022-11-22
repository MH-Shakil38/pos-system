<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ConfigurationRepository
{
    public static function storeConfig($table , $data){
        $data['value'] = ['slug' =>  Str::slug($data['request']['name']), 'created_by' => Auth::user()->id];
        $data = array_merge($data['value'],$data['request']);
        $model = 'App\Models\\'.$table;
        return $model::query()->create($data);
    }

}
