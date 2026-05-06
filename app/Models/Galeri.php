<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    public $timestamps = false;
    public const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'image',
        'created_at',
    ];
}
