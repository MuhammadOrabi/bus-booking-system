<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\BusTrip;
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
        $bus1 = Bus::find(1);
        $bus2 = Bus::find(2);

        $trip1 = Trip::create(['title' => 'Cairo to Asyut']);
        $trip2 = Trip::create(['title' => 'Cairo to Aswan']);

        $station1 = Station::where('title', 'Cairo')->first();
        $station2 = Station::where('title', 'Faiyum')->first();
        $station3 = Station::where('title', 'Minya')->first();
        $station4 = Station::where('title', 'Asyut')->first();
        $station5 = Station::where('title', 'Aswan')->first();

        StationTrip::insert([
            ['trip_id' => $trip1->id, 'station_id' => $station1->id, 'order' => 1],
            ['trip_id' => $trip1->id, 'station_id' => $station2->id, 'order' => 2],
            ['trip_id' => $trip1->id, 'station_id' => $station3->id, 'order' => 3],
            ['trip_id' => $trip1->id, 'station_id' => $station4->id, 'order' => 4],

            ['trip_id' => $trip2->id, 'station_id' => $station1->id, 'order' => 1],
            ['trip_id' => $trip2->id, 'station_id' => $station2->id, 'order' => 2],
            ['trip_id' => $trip2->id, 'station_id' => $station3->id, 'order' => 3],
            ['trip_id' => $trip2->id, 'station_id' => $station4->id, 'order' => 4],
            ['trip_id' => $trip2->id, 'station_id' => $station5->id, 'order' => 5],

        ]);

        BusTrip::insert([
            ['trip_id' => $trip1->id, 'bus_id' => $bus1->id, 'start_time' => '20:00', 'date' => '2022-06-22', 'status' => 'ready'],
            ['trip_id' => $trip2->id, 'bus_id' => $bus2->id, 'start_time' => '10:00', 'date' => '2022-06-22', 'status' => 'ready'],
        ]);

    }
}
