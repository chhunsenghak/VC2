<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitDuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'duration',
        'price',
        'limit_duration_type_id',
    ];
    public function limitDurationType()
    {
        return $this->belongsTo(LimitDurationType::class);
    }
}
