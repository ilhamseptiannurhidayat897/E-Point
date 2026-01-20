<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BKSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            walikelasSeeder::class,
            PetugasSeeder::class,
            JenisPelanggaranSeeder::class,
            JenisPrestasiSeeder::class,
        ]);
    }
}
