<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'text',
        'images'
    ];

    public function frontuser()
    {
        return $this->belongsTo(Frontuser::class, 'receiver_id');
    }

    
}
