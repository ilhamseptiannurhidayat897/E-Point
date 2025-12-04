<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'student_id','violation_type_id','reported_by','violation_date','notes','is_confirmed'
    ];

    public function student() { return $this->belongsTo(Student::class); }
    public function type() { return $this->belongsTo(ViolationType::class, 'violation_type_id'); }
    public function reporter() { return $this->belongsTo(User::class, 'reported_by'); }
}

