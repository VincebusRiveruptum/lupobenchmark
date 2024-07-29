<?php

namespace App\Models\pivots;

use App\Models\Feature;
use App\Models\Gpu;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FeatureGpu extends Pivot
{
    public function gpus(): BelongsToMany{
        return $this->belongsToMany(Gpu::class, 'gpu_id');
    }

    public function features(): BelongsToMany{
        return $this->belongsToMany(Feature::class, 'feature_id');
    }
}
