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
            'architecture_id' => $this->architecture_id,
            'family_id' => $this->family_id,
            'cpu_socket_id' => $this->cpu_socket_id,
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
