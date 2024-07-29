<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GpuRenderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'shaders',
        'tmus',
        'rops',
        'tensor',
        'sm',
        'rt_cores',
    ];

    // === Relationships ====

    public function gpus(): HasMany{
        return $this->hasMany(Gpu::class);
    }
}
