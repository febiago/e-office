<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'pengirim',
        'perihal',
        'tgl_surat',
        'tgl_diterima',
        'ditujukan',
        'kategori',
        'keterangan',
        'image'
    ];
    
    public function disposisi()
    {
        return $this->hasOne(Disposisi::class);
    }
}