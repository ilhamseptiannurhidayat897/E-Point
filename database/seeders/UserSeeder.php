<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'login_id' => '3001',
            'password' => Hash::make('12345678'),
            'role' => 'siswa',
        ]);

        // GURU
        User::create([
            'login_id' => '2001', // NIP
            'password' => Hash::make('12345678'),
            'role' => 'guru',
        ]);

        // PETUGAS
        User::create([
            'login_id' => '1001', // NK
            'password' => Hash::make('12345678'),
            'role' => 'petugas',
        ]);
    }
}