<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitDurationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function limit_duration(){
        return $this->hasMany(LimitDuration::class);
    }
}
