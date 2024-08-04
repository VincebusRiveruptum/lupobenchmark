<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hardware_device_id' => $this->hardware_device_id,
            'gpu_detail_id' => GpuDetailResource::make($this->whenLoaded('gpu_detail')),
            'gpu_render_detail_id' => GpuRenderDetailResource::make($this->whenLoaded('gpu_render_detail')),
            'gpu_memory_detail_id' => GpuMemoryDetailResource::make($this->whenLoaded('gpu_memory_detail')),
            'gpu_bus_interface_id' => GpuBusInterfaceResource::make($this->whenLoaded('gpu_bus_interface')),
            'model_name' => $this->model_name,
            'release_date' => $this->release_date,
        ];
    }
}
