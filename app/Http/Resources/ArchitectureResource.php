<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArchitectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'manufacturer_id' => ManufacturerResource::make($this->whenLoaded('manufacturer')),
            'type' => $this->type,
            'name' => $this->name,
        ];
    }
}
