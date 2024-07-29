<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GpuBusInterface extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function gpu(): HasOne{
        return $this->hasOne(Gpu::class);
    }
}
