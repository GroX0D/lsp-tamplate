<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        return view('galeri.index', [
            'galeris' => Galeri::orderByDesc('created_at')->paginate(12),
        ]);
    }
}
