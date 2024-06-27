<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'commune_id'];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('name', 'commune_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}