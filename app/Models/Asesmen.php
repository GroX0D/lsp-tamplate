<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asesmen extends Model
{
    protected $fillable = [
        'pendaftaran_id',
        'asesor_id',
        'tanggal_asesmen',
        'hasil',
        'catatan',
    ];

    protected $casts = [
        'tanggal_asesmen' => 'date',
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function asesor(): BelongsTo
    {
        return $this->belongsTo(Asesor::class);
    }

    public function detailAsesmen(): HasMany
    {
        return $this->hasMany(DetailAsesmen::class);
    }
}
