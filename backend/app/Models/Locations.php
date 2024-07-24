<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = ["latitude", "longitude"];

    public function frontuser()
    {
        return $this->belongsTo(FrontUser::class);
    }
}
