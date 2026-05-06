<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;

class SkemaController extends Controller
{
    public function index()
    {
        return view('skema.index', [
            'skemas' => SkemaSertifikasi::with('unitKompetensi')->orderByDesc('created_at')->paginate(12),
        ]);
    }

    public function show(SkemaSertifikasi $skema)
    {
        return view('skema.show', compact('skema'));
    }
}
