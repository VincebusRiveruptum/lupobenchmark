<?php

namespace App\Models;

use App\Models\pivots\FeatureGpu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_type_id',
        'name',
        'version',
    ];

    // === Relationships ====

    public function feature_type(): BelongsTo{
        return $this->belongsTo(FeatureType::class, 'feature_type_id');
    }

    public function cpu_features(): HasMany{
        return $this->hasMany(CpuFeature::class);
    }

    public function gpu_features(): HasMany{
        return $this->hasMany(FeatureGpu::class);
    }
}
