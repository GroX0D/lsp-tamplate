<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('admin.pendaftarans.index', [
            'pendaftarans' => Pendaftaran::with(['peserta.user', 'skemaSertifikasi'])->orderBy('created_at', 'desc')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.pendaftarans.create', [
            'pesertas' => Peserta::with('user')->orderBy('created_at', 'desc')->get(),
            'skemas' => SkemaSertifikasi::orderBy('nama_skema')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'peserta_id' => ['required', 'exists:peserta,id'],
            'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
            'tanggal_daftar' => ['required', 'date'],
            'status' => ['required', Rule::in(['pending', 'diterima', 'ditolak'])],
        ]);

        Pendaftaran::create($data);

        return redirect()->route('admin.pendaftarans.index')->with('success', 'Pendaftaran berhasil dibuat.');
    }

    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftarans.show', compact('pendaftaran'));
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftarans.edit', [
            'pendaftaran' => $pendaftaran,
            'pesertas' => Peserta::with('user')->orderBy('created_at', 'desc')->get(),
            'skemas' => SkemaSertifikasi::orderBy('nama_skema')->get(),
        ]);
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $data = $request->validate([
            'peserta_id' => ['required', 'exists:peserta,id'],
            'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
            'tanggal_daftar' => ['required', 'date'],
            'status' => ['required', Rule::in(['pending', 'diterima', 'ditolak'])],
        ]);

        $pendaftaran->update($data);

        return redirect()->route('admin.pendaftarans.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftarans.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
