<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{


    protected $table = 'pelanggaran'; // ⬅️ INI WAJIB


    protected $fillable = [
        'siswa_id',
        'jenis_pelanggaran_id',
        'admin_id',
        'petugas_id',
        'keterangan',
        'foto',
        'status',
        'verified_by',
        'verified_at',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];

    // RELATIONSHIP
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jenisPelanggaran()
    {
        return $this->belongsTo(JenisPelanggaran::class, 'jenis_pelanggaran_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
