<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class District extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'province_id'];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('id', 'name', 'province_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
