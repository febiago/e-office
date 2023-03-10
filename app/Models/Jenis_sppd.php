<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_sppd extends Model
{
    use HasFactory;
    public function sppd()
    {
        return $this->hasMany(Sppd::class);
    }
}
