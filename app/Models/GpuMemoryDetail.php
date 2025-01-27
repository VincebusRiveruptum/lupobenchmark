<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GpuMemoryDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'memory_type_id',
        'memory_bus_width',
        'memory_clock',
        'memory_size',
    ];

    // === Relationships ====

    public function memory_type(): BelongsTo{
        return $this->belongsTo(MemoryType::class, 'memory_type_id');
    }

    public function gpus(): HasMany{
        return $this->hasMany(Gpu::class);
    }
}
