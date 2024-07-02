<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'province' => $this->province ? $this->province->name : null,
            'district' => $this->district ? $this->district->name : null,
            'commune' => $this->commune ? $this->commune->name : null,
            'village' => $this->village ? $this->village->name : null,
        ];
    }
}
