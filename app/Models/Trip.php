<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function stations() {
        return $this->belongsToMany(Station::class, 'station_trips')->withPivot('order');
    }

    public function stationTrips() {
        return $this->hasMany(StationTrip::class);
    }
}
