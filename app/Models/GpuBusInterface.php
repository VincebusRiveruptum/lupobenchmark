<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GpuBusInterface extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function gpus(): HasMany{
        return $this->hasMany(Gpu::class);
    }
}
