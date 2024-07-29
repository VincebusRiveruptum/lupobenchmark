<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'type',
        'name',
    ];

    // === Relationships ====

    public function cpus(): HasMany{
        return $this->hasMany(Cpu::class);
    }
}
