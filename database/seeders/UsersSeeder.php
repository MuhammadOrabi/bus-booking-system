<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'User', 'email' => 'user@example.com', 'password' => Hash::make('password'), 'role_id' => 2
        ]);
    }
}
