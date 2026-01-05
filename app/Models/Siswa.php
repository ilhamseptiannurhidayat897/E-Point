<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'nis',
        'nama',
        'jk',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function prestasi() 
    {
        return $this->hasMany(Prestasi::class);
    }  
    public function Pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }   
        
}