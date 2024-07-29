<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'hardware_device_id',
        'storage_manufacturer_id',
        'memory_type_id',
        'model_name',
        'size',
    ];

    // == Relationships ==

    public function storage_manufacturer(): BelongsTo{
        return $this->belongsTo(StorageManufacturer::class, 'storage_manufacturer_id');
    }

    public function memory_type():BelongsTo{
        return $this->belongsTo(MemoryType::class, 'memory_type_id');
    }
}
