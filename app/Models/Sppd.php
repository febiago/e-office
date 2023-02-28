<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;
}

public function pegawai()
{
    return $this->belongsTo(Pegawai::class);
}
public function surat_keluar()
{
    return $this->belongsTo(Surat_keluar::class);
}
public function jenis_sppd()
{
    return $this->belongsTo(Jenis_sppd::class);
}