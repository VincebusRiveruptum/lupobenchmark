<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuDetailResource extends JsonResource
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
            'architecture_id' => ArchitectureResource::make($this->whenLoaded('architecture')),
            'gpu_name' => $this->gpu_name,
            'process_size' => $this->process_size,
            'transistors' => $this->transistors,
        ];
    }
}
