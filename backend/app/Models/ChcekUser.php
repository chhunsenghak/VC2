<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChcekUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'check',
        'start_date',
        'end_date',
        '',
    ];
}
