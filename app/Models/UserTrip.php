<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTrip extends Model
{
    use HasFactory;
    protected $fillable = [
        'seat_id',
        'trip_id',
        'user_id',
        'from_station_id',
        'to_station_id',
        'status'
    ];

}
