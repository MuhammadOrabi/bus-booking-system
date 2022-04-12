<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['title' => 'Alexandria', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Aswan', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Asyut', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Beheira', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Beni Suef', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Cairo', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Dakahlia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Damietta', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Faiyum', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Gharbia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Giza', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Ismailia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kafr El Sheikh', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Luxor', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Matruh', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Minya', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Monufia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'New Valley', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'North Sinai', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Port Said', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Qalyubia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Qena', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Red Sea', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sharqia', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sohag', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'South Sinai', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Suez', 'created_at' => now(), 'updated_at' => now()],
        ];
        Station::insert($cities);
    }
}
