<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $fillable = ["phone_number", "address_id", "shop_owner_id"];


    public function location(){
        return $this->belongsTo(Locations::class);
    }

    public function frontuser(){
        return $this->belongsTo(Frontuser::class, "shop_owner_id");
    }


    public function products(){
        return $this->hasMany(Products::class, 'shop_id');
    }
}
