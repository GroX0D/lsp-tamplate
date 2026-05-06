<?php

namespace App\Models;

use App\Models\SkemaSertifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendaftaranPublic extends Model
{
    protected $table = 'pendaftaran_public';

    public $timestamps = false;
    public const UPDATED_AT = null;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'skema_id',
        'status',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function skema(): BelongsTo
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_id');
    }
}
