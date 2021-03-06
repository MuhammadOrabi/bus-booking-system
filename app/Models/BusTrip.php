<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTrip extends Model
{
    use HasFactory;

    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function trip() {
        return $this->belongsTo(Trip::class);
    }
}
