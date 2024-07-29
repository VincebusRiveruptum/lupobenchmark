<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CpuSocket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function cpus(): HasMany{
        return $this->hasMany(Cpu::class);
    }
}
