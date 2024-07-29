<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
    ];

    // == Relationships ==

    public function architectures(): HasMany{
        return $this->hasMany(Architecture::class);
    }

    public function families(): HasMany{
        return $this->hasMany(Family::class);
    }

    public function gpu_details(): HasMany{
        return $this->hasMany(GpuDetail::class);
    }
}
