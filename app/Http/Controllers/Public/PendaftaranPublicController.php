<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranPublic;
use Illuminate\Http\Request;

class PendaftaranPublicController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_hp' => ['required', 'string', 'max:25'],
            'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
        ]);

        PendaftaranPublic::create($data + ['status' => 'baru', 'created_at' => now()]);

        return redirect()->back()->with('success', 'Pendaftaran Anda berhasil dikirim. Silakan tunggu konfirmasi admin.');
    }
}
