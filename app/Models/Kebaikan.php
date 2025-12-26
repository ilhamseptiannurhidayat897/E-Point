<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebaikan extends Model
{
        protected $table = 'kebaikan';
    
        protected $fillable = [
            'siswa_id',
            'jenis_kebaikan_id',
            'keterangan',
            'tanggal',
            'poin',
            'petugas_id',
        ];

        public function siswa()
        {
            return $this->belongsTo(Siswa::class);
        }
    
        public function jenisKebaikan()
        {
            return $this->belongsTo(JenisKebaikan::class);
        }
    
        public function petugas()
        {
            return $this->belongsTo(User::class, 'petugas_id');
        }
}
    

