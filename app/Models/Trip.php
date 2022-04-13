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

    public function buses() {
        return $this->belongsToMany(Bus::class, 'bus_trips')->withPivot('status', 'id', 'start_time', 'date');
    }

    public function busTrips() {
        return $this->hasMany(BusTrip::class);
    }

    public function userTrips() {
        return $this->hasMany(UserTrip::class);
    }


    public function validate($from_station, $to_station, $seat_id = null) {
        // 1. make sure that the from station is before the to station
        $stations = $this->stations->whereIn('id', [$from_station, $to_station])->sortBy('pivot_order')->pluck('id');
        if ($stations[0] != $from_station && $stations[1] != $to_station) {
            return false;
        }

        // 2. check if the trip have bus with seats that weren't booked
        $seatsCount = $this->buses()->whereHas('seats', function($query) use ($seat_id) {
            $query->doesntHave('userTrips');
            if ($seat_id) {
                $query->where('id', $seat_id);
            }
        })->count();
        
        if (!$seatsCount) {
            // 3. chcek if any of the booked seats will by emptied for the user
            $stationsBeforeFrom = $this->stations->takeUntil(function($station) use ($from_station) {
                return $station->id == $from_station;
            })->pluck('id');

            $tripsCount;
            if ($seat_id) {
                $tripsCount = $this->userTrips()->whereIn('to_station_id', $stationsBeforeFrom)->where('seat_id', $seat_id)->count();
            } else {
                $tripsCount = $this->userTrips()->whereIn('to_station_id', $stationsBeforeFrom)->count();
            }
            if (!$tripsCount) {
                return false;
            }

        }
        return true;
    }
}
