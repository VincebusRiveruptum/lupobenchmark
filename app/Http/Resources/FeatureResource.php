<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'feature_type_id' => FeatureTypeResource::make($this->whenLoaded('feature_type')),
            'name' => $this->name,
            'version' => $this->version,
        ];
    }
}
