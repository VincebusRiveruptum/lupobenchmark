<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GpuDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'architecture_id',
        'gpu_name',
        'process_size',
        'transistors',
    ];

    // === Relationships ====

    public function gpus(): HasMany{
        return $this->hasMany(Gpu::class);
    }

    public function manufacturer(): BelongsTo{
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
