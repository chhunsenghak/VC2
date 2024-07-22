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
            "bio" => $this->bio,
            "linkedin" => $this->linkedin,
            "facebook" => $this->facebook,
            "telegram" => $this->telegram,
            "phone" => $this->phone,
            "profile" => $this->profile,
            "gender" => $this->gender,
            "shop" => $this->shop,
            "check" => $this->check,
            "location" => $this->location
        ];
    }
}
