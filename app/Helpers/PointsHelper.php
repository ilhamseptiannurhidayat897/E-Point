<?php

namespace App\Helpers;

use App\Models\PointsSummary;
use App\Models\Violation;
use App\Models\GoodPoint;

class PointsHelper
{
    public static function updateSummary($studentId)
    {
        $totalViolation = Violation::where('student_id', $studentId)
            ->with('type')
            ->get()
            ->sum(fn($v) => $v->type->points);

        $totalGood = GoodPoint::where('student_id', $studentId)
            ->with('type')
            ->get()
            ->sum(fn($g) => $g->type->points);

        PointsSummary::updateOrCreate(
            ['student_id' => $studentId],
            [
                'total_violation_points' => $totalViolation,
                'total_good_points' => $totalGood,
                'net_points' => $totalGood - $totalViolation,
            ]
        );
    }
}
