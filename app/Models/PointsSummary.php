<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointsSummary extends Model
{
    protected $table = 'points_summary'; // ← tambahkan ini

    protected $fillable = [
        'student_id',
        'total_violation_points',
        'total_good_points',
        'net_points'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
