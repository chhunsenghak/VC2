<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'discount',
        'shop_id',
        'stock_id',
        'categorys_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categorys::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
    
    public static function store($request, $id = null)
    {
        $data = (array)$request; // Convert object to array
        return self::updateOrCreate(['id' => $id], $data);
    }
}
