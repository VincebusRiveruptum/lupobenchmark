<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StorageManufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function rams(): HasMany{
        return $this->hasMany(Ram::class);
    }

    public function ssds(): HasMany{
        return $this->hasMany(Ssd::class);
    }

    public function hdds(): HasMany{
        return $this->hasMany(Hdd::class);
    }
}
