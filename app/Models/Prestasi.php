<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'siswa_id',
        'jenis_prestasi_id',
        'petugas_id',
        'keterangan',
        'foto',
        'status'
    ];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function jenis() {
        return $this->belongsTo(JenisPrestasi::class,'jenis_prestasi_id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
