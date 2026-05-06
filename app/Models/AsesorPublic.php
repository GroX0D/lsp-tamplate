<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsesorPublic extends Model
{
    protected $table = 'asesor_public';

    protected $fillable = [
        'nama',
        'foto',
        'bidang_keahlian',
        'deskripsi',
    ];
}
