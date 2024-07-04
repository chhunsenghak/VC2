<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'stock_type_id'
    ];

    public function product()
    {
        return $this->hasOne(Products::class);
    }

    public function stock_type(){
        return $this->belongsTo(StockType::class, 'stock_type_id');
    }
}
