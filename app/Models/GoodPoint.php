<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodPoint extends Model
{
    protected $fillable = [
        'student_id','good_point_type_id','recorded_by','given_at','notes'
    ];

    public function student() { return $this->belongsTo(Student::class); }
    public function type() { return $this->belongsTo(GoodPointType::class); }
    public function recorder() { return $this->belongsTo(User::class,'recorded_by'); }
}

