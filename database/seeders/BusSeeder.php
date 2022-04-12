<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bus1 = Bus::create(['plate_number' => '12345']);
        $bus2 = Bus::create(['plate_number' => '54321']);

        foreach (range(1, 12) as $number) {
            $bus1->seats()->create();
            $bus2->seats()->create();
        }
    }
}
