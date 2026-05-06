<?php

namespace App\Models;

use App\Models\Pendaftaran;
use App\Models\UnitKompetensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkemaSertifikasi extends Model
{
    protected $table = 'skema_sertifikasi';

    protected $fillable = [
        'nama_skema',
        'kode_skema',
        'deskripsi',
    ];

    public function unitKompetensi(): HasMany
    {
        return $this->hasMany(UnitKompetensi::class, 'skema_id');
    }

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'skema_id');
    }
}
