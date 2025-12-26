<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKebaikan extends Model
{
    protected $table = 'jenis_kebaikan';

    protected $fillable = [
        'nama',
        'poin',
    ];

    public function kebaikan()
    {
        return $this->hasMany(Kebaikan::class);
    }
}
