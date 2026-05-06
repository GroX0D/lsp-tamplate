<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    public $timestamps = false;
    public const UPDATED_AT = null;

    protected $fillable = [
        'nama',
        'foto',
        'isi',
        'rating',
        'created_at',
    ];
}
