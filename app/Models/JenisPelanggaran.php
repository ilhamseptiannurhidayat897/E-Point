<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPelanggaran extends Model
{
    protected $table = 'jenis_pelanggaran';

    protected $fillable = [
        'nama',
        'poin',
    ];
    public function Pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }
}
