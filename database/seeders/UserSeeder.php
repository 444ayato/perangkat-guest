<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User utama
        User::create([
            'name'     => 'Azra',
            'email'    => 'azra@pcr.ac.id',
            'role'     => 'admin',
            'password' => Hash::make('azra123'),
        ]);

        // // Generate 100 user
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 100; $i++) {
        //     User::create([
        //         'name' => $faker->name(),
        //         'email' => "user@mail.com",
        //         'password' => Hash::make('password'),
        //     ]);
        // }
    }
}
