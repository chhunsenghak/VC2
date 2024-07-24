<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        "receiver_id",
        "title",
        "description",
        "type",
    ];

    public static function store($receiver_id, $title, $description, $type){
        $notification = new Notification;
        $notification->receiver_id = $receiver_id;
        $notification->title = $title;
        $notification->description = $description;
        $notification->type = $type;
        $notification->save();
        return $notification;
    }
}
