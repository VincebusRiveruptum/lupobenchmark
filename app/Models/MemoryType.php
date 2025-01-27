<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemoryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // == Relationships ==

    public function gpu_memory_details(): HasMany{
        return $this->hasMany(GpuMemoryDetail::class);
    }

    public function rams(): HasMany{
        return $this->hasMany(Ram::class);
    }

    public function ssds(): HasMany{
        return $this->hasMany(Ssd::class);
    }
}
