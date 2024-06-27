<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $filled = ['name'];

    public static function list(){
        return self::all();
    }

    public static function create($request, $id = null){
        $data = $request->only('name');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
        
    }
}
