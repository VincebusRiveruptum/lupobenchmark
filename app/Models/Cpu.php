<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Cpu extends Model
{
    use HasFactory;

    protected $fillable = [
        'hardware_device_id',
        'architecture_id',
        'family_id',
        'cpu_socket_id',
        'model_name',
        'release_date',
        'cores',
        'e_cores',
        'p_cores',
        'threads',
        'l1_cache',
        'l2_cache',
        'l3_cache',
        'base_clock',
        'tdp',
        'source',
    ];

    public function casts(): array
    {
        return [
            'release_date' => 'datetime',
        ];
    }

    /*
    public function hardware_device(): BelongsTo{
        return $this->belongsTo(HardwareDevice::class, 'hardware_device_id');
    }
    */
    public function architecture(): BelongsTo
    {
        return $this->belongsTo(Architecture::class, 'architecture_id');
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function cpu_socket(): BelongsTo
    {
        return $this->belongsTo(CpuSocket::class, 'cpu_socket_id');
    }

    // == Polymorphic Relationship ==

    public function hardware_devices(): MorphOne
    {
        return $this->morphOne(HardwareDevice::class, 'hardwareDeviceable');
    }
}
