<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\StationTrip;
use App\Models\Trip;
use App\Models\UserTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TripsController extends Controller
{
    public function get(Request $request) {
        $validator = Validator::make($request->all(), [
            'from_station' => 'required|exists:stations,id',
            'to_station' => 'required|exists:stations,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $trips = Trip::with('stations', 'buses', 'buses.seats.userTrips')
        ->whereHas('stations', function($query) {
            $query->where('id', request('from_station'));
        })->whereHas('stations', function($query) {
            $query->where('id', request('to_station'));
        })->whereHas('busTrips', function($query) {
            $query->where('status', 'ready')->has('bus');
        })->get()
        ->filter(function ($trip) {
            return $trip->validate(request('from_station'), request('to_station'));
        });



        return response()->json(['trips' => $trips]);
    }


    public function bookSeat(Request $request) {
        $validator = Validator::make($request->all(), [
            'from_station' => 'required|exists:stations,id',
            'to_station' => 'required|exists:stations,id',
            'seat_id' => 'required|exists:seats,id',
            'trip_id' => 'required|exists:trips,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $tripCanBeBooked = Trip::find(request('trip_id'))->validate(request('from_station'), request('to_station'), request('seat_id'));
        if (!$tripCanBeBooked) {
            return response()->json([
                'errors' => [
                    'message' => 'seat already booked'
                ]
            ], 422);
        }

        UserTrip::create([
            'seat_id' => request('seat_id'),
            'trip_id' => request('trip_id'),
            'user_id' => $request->user()->id,
            'from_station_id' => request('from_station'),
            'to_station_id' => request('to_station'),
            'status' => 'booked'
        ]);

        return response()->json(['message' => 'seat booked successfully']);
    }
}
