<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis','name','tingkat','jurusan','kelas','jenis_kelamin','alamat','photo'
    ];

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }

    public function goodPoints()
    {
        return $this->hasMany(GoodPoint::class);
    }

    public function summary()
    {
        return $this->hasOne(PointsSummary::class);
    }
}

