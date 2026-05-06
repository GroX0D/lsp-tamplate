<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'user_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
