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
}
