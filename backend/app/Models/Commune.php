<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public static function list()
    {
        return self::all();
    }

    public static function create($request, $id = null)
    {
        $data = $request->only('name', 'district_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
