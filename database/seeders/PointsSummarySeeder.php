<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PointsSummary;
use App\Models\Student;

class PointsSummarySeeder extends Seeder
{
    public function run(): void
    {
        foreach (Student::all() as $student) {
            PointsSummary::create([
                'student_id' => $student->id,
                'total_violation_points' => 0,
                'total_good_points' => 0,
                'net_points' => 0,
            ]);
        }
    }
}
