<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Architecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'type',
        'name',
    ];

    public function manufacturer(): HasOne{
        return $this->hasOne(Manufacturer::class);
    }

    public function cpus(): HasMany{
        return $this->hasMany(Cpu::class);
    }
}
