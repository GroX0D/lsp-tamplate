<?php

namespace App\Models;

use App\Models\Asesmen;
use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pendaftaran extends Model
{
    protected $fillable = [
        'peserta_id',
        'skema_id',
        'tanggal_daftar',
        'status',
    ];

    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }

    public function skemaSertifikasi(): BelongsTo
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_id');
    }

    public function asesmen(): HasMany
    {
        return $this->hasMany(Asesmen::class);
    }
}
