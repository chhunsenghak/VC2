<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'district_id', 'commune_id', 'village_id'];

    public function shop()
    {
        return $this->belongsTo(Shops::class);
    }
}
