<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViolationType extends Model
{
    protected $fillable = ['code','name','points','description'];
    public function violations() { return $this->hasMany(Violation::class); }
}

