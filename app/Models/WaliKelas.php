<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $table = 'wali_kelas';

    protected $fillable = ['user_id','nip','nama','kelas_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    // AKSES SISWA YANG DIWALI-KELASI
    public function siswa() {
        return $this->kelas->siswa();
    }
}
