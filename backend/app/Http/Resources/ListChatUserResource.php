<?php

namespace App\Http\Resources;

use Database\Seeders\FrontUserSeeder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FrontUserResource;
class ListChatUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'text' => $this->text,
            'images' => $this->images,
            'created_at' => $this->created_at,
        ];
    }
}
