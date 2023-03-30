<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_masuk_id',
        'diteruskan',
        'keterangan',
        'image'
    ];
    
    public function Surat_masuk()
    {
        return $this->belongsTo(Surat_masuk::class);
    }

}

