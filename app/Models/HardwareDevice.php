<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class HardwareDevice extends Model
{
    use HasFactory;


    public function hardwareDeviceable(): MorphTo{
        return $this->morphTo();
    }
}
