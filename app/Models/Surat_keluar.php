<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'perihal',
        'tgl_surat',
        'tgl_dikirim',
        'ditujukan',
        'kategori',
        'keterangan',
        'image'
    ];

    public function sppd()
    {
    return $this->hasMany(Sppd::class);
    }
}
