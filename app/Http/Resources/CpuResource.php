<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CpuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hardware_device_id' => $this->id,
            'architecture_id' => ArchitectureResource::make($this->whenLoaded('architecture')),
            'family_id' => FamilyResource::make($this->whenLoaded('family')),
            'cpu_socket_id' => CpuSocketResource::make($this->whenLoaded('cpu_socket')),
            'model_name' => $this->model_name,
            'release_date' => $this->release_date,
            'cores' => $this->cores,
            'e_cores' => $this->e_cores,
            'p_cores' => $this->p_cores,
            'threads' => $this->threads,
            'l1_cache' => $this->l1_cache,
            'l2_cache' => $this->l2_cache,
            'l3_cache' => $this->l3_cache,
            'base_clock' => $this->base_clock,
            'tdp' => $this->tdp,
            'source' => $this->source,
        ];
    }
}
