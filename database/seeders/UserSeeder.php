<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User Petugas
        User::firstOrCreate(
            ['nis' => '1001'], // Atribut untuk dicari
            [
                'name' => 'Admin Petugas',
                'email' => 'petugas@smkn1kawali.sch.id',
                'password' => Hash::make('password'),
                'role' => 'petugas',
            ]
        );

        // User Guru
        User::firstOrCreate(
            ['nis' => '2001'], // Atribut untuk dicari
            [
                'name' => 'Guru Pembimbing',
                'email' => 'guru@smkn1kawali.sch.id',
                'password' => Hash::make('password'),
                'role' => 'guru',
            ]
        );

        // User Siswa
        User::firstOrCreate(
            ['nis' => '3001'], // Atribut untuk dicari
            [
                'name' => 'Siswa Contoh',
                'email' => 'siswa@smkn1kawali.sch.id',
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]
        );
    }
}