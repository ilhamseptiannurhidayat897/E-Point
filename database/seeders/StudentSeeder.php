<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'nis' => '2025001',
                'name' => 'Ilham Saputra',
                'tingkat' => '10',
                'jurusan' => 'TKJ',
                'kelas' => 'A',
                'jenis_kelamin' => 'L',
                'alamat' => 'Ciamis',
            ],
            [
                'nis' => '2025002',
                'name' => 'Rizky Pratama',
                'tingkat' => '11',
                'jurusan' => 'RPL',
                'kelas' => 'B',
                'jenis_kelamin' => 'L',
                'alamat' => 'Kawali',
            ],
            [
                'nis' => '2025003',
                'name' => 'Siti Aisyah',
                'tingkat' => '12',
                'jurusan' => 'AKL',
                'kelas' => 'C',
                'jenis_kelamin' => 'P',
                'alamat' => 'Cisaga',
            ],
        ];

        foreach ($students as $s) {
            Student::create($s);
        }
    }
}
