<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{
    public function show(string $section)
    {
        $sections = [
            'users' => 'Manajemen Users',
            'skema' => 'Skema Sertifikasi',
            'unit' => 'Unit Kompetensi',
            'pendaftaran' => 'Pendaftaran',
            'asesmen' => 'Asesmen',
        ];

        abort_if(! array_key_exists($section, $sections), 404);

        return view('admin.section', [
            'section' => $section,
            'title' => $sections[$section],
        ]);
    }
}
