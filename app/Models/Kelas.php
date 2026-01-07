<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'tingkat',
        'jurusan',
        'nomor',
        'nama_kelas'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
        public function waliKelas()  
    { 
        return $this->hasOne(WaliKelas::class);
    }
}

