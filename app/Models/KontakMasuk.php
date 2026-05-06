<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakMasuk extends Model
{
    protected $table = 'kontak_masuk';

    public $timestamps = false;
    public const UPDATED_AT = null;

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'created_at',
    ];
}
