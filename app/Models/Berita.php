<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];
}
