<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuRenderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'shaders' => $this->shaders,
            'tmus' => $this->tmus,
            'rops' => $this->rops,
            'tensor' => $this->tensor,
            'sm' => $this->sm,
            'rt_cores' => $this->rt_cores,
        ];
    }
}
