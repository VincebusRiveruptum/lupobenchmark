<?php

namespace App\Models\pivots;

use App\Models\Cpu;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CpuFeature extends Pivot
{
    //

    public function cpus(): BelongsToMany{
        return $this->belongsToMany(Cpu::class, 'cpu_id');
    }

    public function features(): BelongsToMany{
        return $this->belongsToMany(Feature::class, 'feature_id');
    }
}
