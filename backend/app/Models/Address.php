<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'province_id',
        'district_id',
        'commune_id',
        'village_id',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public static function list()
    {
        return self::all();
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('province_id', 'district_id', 'commune_id', 'village_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
