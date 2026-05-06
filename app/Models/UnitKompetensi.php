<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitKompetensi extends Model
{
    protected $table = 'unit_kompetensi';

    protected $fillable = [
        'skema_id',
        'kode_unit',
        'nama_unit',
    ];

    public function skemaSertifikasi(): BelongsTo
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_id');
    }
}
