<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeatureType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // === Relationships ====

    public function features(): HasMany{
        return $this->hasMany(Feature::class);
    }
}
