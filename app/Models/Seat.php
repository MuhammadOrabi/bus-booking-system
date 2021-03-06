<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function userTrips() {
        return $this->hasMany(UserTrip::class);
    }

}
