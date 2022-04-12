<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\StationTrip;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trip = Trip::create(['title' => 'Cairo to Asyut']);
        $station1 = Station::where('title', 'Cairo')->first();
        $station2 = Station::where('title', 'Faiyum')->first();
        $station3 = Station::where('title', 'Minya')->first();
        $station4 = Station::where('title', 'Asyut')->first();

        StationTrip::insert([
            ['trip_id' => $trip->id, 'station_id' => $station1->id, 'order' => 1],
            ['trip_id' => $trip->id, 'station_id' => $station2->id, 'order' => 2],
            ['trip_id' => $trip->id, 'station_id' => $station3->id, 'order' => 3],
            ['trip_id' => $trip->id, 'station_id' => $station4->id, 'order' => 4],
        ]);


        $trip = Trip::create(['title' => 'Cairo to Aswan']);
        $station1 = Station::where('title', 'Cairo')->first();
        $station2 = Station::where('title', 'Faiyum')->first();
        $station3 = Station::where('title', 'Minya')->first();
        $station4 = Station::where('title', 'Asyut')->first();
        $station5 = Station::where('title', 'Aswan')->first();

        StationTrip::insert([
            ['trip_id' => $trip->id, 'station_id' => $station1->id, 'order' => 1],
            ['trip_id' => $trip->id, 'station_id' => $station2->id, 'order' => 2],
            ['trip_id' => $trip->id, 'station_id' => $station3->id, 'order' => 3],
            ['trip_id' => $trip->id, 'station_id' => $station4->id, 'order' => 4],
        ]);
    }
}
