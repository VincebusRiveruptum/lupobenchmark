<?php

namespace App\Models;

use App\Models\pivots\FeatureGpu;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Gpu extends Model
{
    use HasFactory;

    protected $fillable = [
        'hardware_device_id',
        'gpu_detail_id',
        'gpu_render_detail_id',
        'gpu_memory_detail_id',
        'gpu_bus_interface_id',
        'model_name',
        'release_date',
    ];

    public function casts(): array{
        return [
            'release_date' => 'datetime',
        ];
    }

    // === Relationships ====

    public function hardware_device(): BelongsTo{
        return $this->belongsTo(HardwareDevice::class, 'hardware_device_id');
    }

    public function features(): HasMany{
        return $this->hasMany(FeatureGpu::class);
    }

    /*
    public function gpu_detail(): BelongsTo{
        return $this->belongsTo()
    }
    */

    // == Polymorphic relation ==

    public function hardware_devices(): MorphOne{
        return $this->morphOne(HardwareDevice::class, 'hardwareDeviceable');
    }

}
