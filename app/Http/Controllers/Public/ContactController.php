<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\KontakMasuk;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $page = Page::where('slug', 'kontak')->where('is_published', true)->first();

        return view('contact.show', compact('page'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'pesan' => ['required', 'string'],
        ]);

        KontakMasuk::create($data + ['created_at' => now()]);

        return redirect()->route('contact.show')->with('success', 'Pesan Anda telah terkirim.');
    }
}
