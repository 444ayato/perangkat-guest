<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProyekSeeder::class,
            LokasiProyekSeeder::class,
            KontraktorSeeder::class,
            TahapanProyekSeeder::class,
            ProgresProyekSeeder::class, // ⬅️ WAJIB ADA
        ]);
    }
}
