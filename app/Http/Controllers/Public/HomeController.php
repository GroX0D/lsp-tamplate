<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AsesorPublic;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SkemaSertifikasi;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'settings' => Setting::first(),
            'skemas' => SkemaSertifikasi::with('unitKompetensi')->orderByDesc('created_at')->get(),
            'berita' => Berita::whereNotNull('published_at')->orderByDesc('published_at')->take(3)->get(),
            'galeri' => Galeri::orderByDesc('created_at')->take(8)->get(),
            'asesors' => AsesorPublic::orderByDesc('created_at')->take(4)->get(),
            'testimoni' => Testimoni::orderByDesc('created_at')->take(3)->get(),
            'faq' => Faq::orderByDesc('id')->take(5)->get(),
            'pages' => Page::where('is_published', true)->get(),
        ]);
    }
}
