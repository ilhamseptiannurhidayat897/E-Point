<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bk extends Model
{
    protected $table = 'bk';

    protected $fillable = ['user_id','nip','nama'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // BK BISA LIHAT SEMUA SISWA
    public function semuaSiswa() {
        return Siswa::query();
    }
}
