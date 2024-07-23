<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class LimitDurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "price" => $this->price,
            "duration" => $this->duration,
            "limit_duration_type_id" => $this->limit_duration_type_id,
            "limit_duration_type" => $this->limit_duration_type,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
