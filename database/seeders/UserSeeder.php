<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Petugas
        User::create([
            'name' => 'Admin Petugas',
            'email' => 'petugas@smkn1kawali.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
            'id_petugas' => 'PTG001',
        ]);

        // Guru
        User::create([
            'name' => 'Guru Pembimbing',
            'email' => 'guru@smkn1kawali.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'guru',
            'nip' => '198501012010011001',
        ]);

        // Siswa
        User::create([
            'name' => 'Ahmad Siswa',
            'email' => 'siswa@smkn1kawali.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
            'nis' => '2024001',
        ]);
    }
}