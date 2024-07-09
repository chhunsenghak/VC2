<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FrontUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "gender" => $this->gender,
            "profile" => $this->profile,
            "shop" => $this->shop,
            "check" => $this->check,
            "phone" => $this->phone,
            "products" => $this->products
        ];
    }
}
