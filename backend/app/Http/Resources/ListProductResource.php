<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Expr\List_;
use App\Http\Resources\ListCategoryResource;
use App\Http\Resources\FrontUserResource;
class ListProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->image,
            'categorys_id' => $this->categorys_id,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'stock_type' => $this->stock->stock_type->name,
            'category' => $this->category,
            'break_product_at' => $this->break_product_at,
            'frontuser' => new FrontUserResource($this->frontuser),
            'created_at' => $this->created_at
        ];
    }
}
