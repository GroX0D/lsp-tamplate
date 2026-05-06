<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        return view('berita.index', [
            'beritas' => Berita::whereNotNull('published_at')->orderByDesc('published_at')->paginate(10),
        ]);
    }

    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->whereNotNull('published_at')->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}
