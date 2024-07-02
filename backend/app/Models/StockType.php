<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Stocks;

class StockType extends Model
{
use HasFactory;
protected $table = 'stock_types';

public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }
    public function stocks(): BelongsTo
    {
        return $this->belongsTo(Stocks::class);
    }




}
