<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuMemoryDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'memory_type_id' => MemoryTypeResource::make($this->whenLoaded('memory_type')),
            'memory_bus_width' => $this->memory_bus_width,
            'memory_clock' => $this->memory_clock,
            'memory_size' => $this->memory_size,
        ];
    }
}
