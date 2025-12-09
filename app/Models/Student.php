<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis','nama','jk','kelas','alamat'
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
