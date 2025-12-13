<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // User admin
        User::create([
            'name' => 'Azra',
            'email' => 'azra@pcr.ac.id',
            'password' => Hash::make('azra123'),
        ]);

        // 49 user lain (total = 50)
        for ($i = 1; $i <= 49; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
