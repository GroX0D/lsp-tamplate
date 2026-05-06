<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asesmen;
use App\Models\Pendaftaran;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'metrics' => [
                'users' => User::count(),
                'skemas' => SkemaSertifikasi::count(),
                'units' => UnitKompetensi::count(),
                'pendaftaran' => Pendaftaran::count(),
                'asesmen' => Asesmen::count(),
            ],
        ]);
    }
}
