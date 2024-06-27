<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name'];

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('id', 'name');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}