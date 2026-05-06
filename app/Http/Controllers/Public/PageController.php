<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AsesorPublic;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Testimoni;

class PageController extends Controller
{
    public function show(string $slug)
    {
        // Handle special pages
        if ($slug === 'tentang-kami') {
            $settings = Setting::first();
            $asesors = AsesorPublic::all();
            $testimoni = Testimoni::all();
            $faq = Faq::all();

            return view('pages.tentang-kami', compact('settings', 'asesors', 'testimoni', 'faq'));
        }

        // Handle database-driven pages
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('pages.show', compact('page'));
    }
}
