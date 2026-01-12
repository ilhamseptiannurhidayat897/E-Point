<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'siswa_id',
        'jenis_prestasi_id',
        'admin_id',
        'petugas_id',
        'keterangan',
        'foto',
        'status',
        'verified_by',
        'verified_at'
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

        public function jenis()
    {
        return $this->belongsTo(JenisPrestasi::class, 'jenis_prestasi_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function getPelaporAttribute()
    {
        // Jika diinput oleh petugas
        if ($this->petugas) {
            return $this->petugas->nama;
        }

        // Jika diinput oleh admin
        if ($this->admin) {
            return $this->admin->name . 'Admin';
        }

        return '-';
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class,'verified_by');
    }
}
