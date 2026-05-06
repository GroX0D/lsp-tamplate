<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asesmen;
use App\Models\Asesor;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AsesmenController extends Controller
{
    public function index()
    {
        return view('admin.asesmens.index', [
            'asesmens' => Asesmen::with(['pendaftaran.peserta.user', 'asesor.user'])->orderBy('created_at', 'desc')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.asesmens.create', [
            'pendaftarans' => Pendaftaran::with(['peserta.user'])->orderBy('created_at', 'desc')->get(),
            'asesors' => Asesor::with('user')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pendaftaran_id' => ['required', 'exists:pendaftaran,id'],
            'asesor_id' => ['required', 'exists:asesors,id'],
            'tanggal_asesmen' => ['required', 'date'],
            'hasil' => ['required', Rule::in(['kompeten', 'belum_kompeten'])],
            'catatan' => ['nullable', 'string'],
        ]);

        Asesmen::create($data);

        return redirect()->route('admin.asesmens.index')->with('success', 'Asesmen berhasil dibuat.');
    }

    public function show(Asesmen $asesmen)
    {
        return view('admin.asesmens.show', compact('asesmen'));
    }

    public function edit(Asesmen $asesmen)
    {
        return view('admin.asesmens.edit', [
            'asesmen' => $asesmen,
            'pendaftarans' => Pendaftaran::with(['peserta.user'])->orderBy('created_at', 'desc')->get(),
            'asesors' => Asesor::with('user')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function update(Request $request, Asesmen $asesmen)
    {
        $data = $request->validate([
            'pendaftaran_id' => ['required', 'exists:pendaftaran,id'],
            'asesor_id' => ['required', 'exists:asesors,id'],
            'tanggal_asesmen' => ['required', 'date'],
            'hasil' => ['required', Rule::in(['kompeten', 'belum_kompeten'])],
            'catatan' => ['nullable', 'string'],
        ]);

        $asesmen->update($data);

        return redirect()->route('admin.asesmens.index')->with('success', 'Asesmen berhasil diperbarui.');
    }

    public function destroy(Asesmen $asesmen)
    {
        $asesmen->delete();

        return redirect()->route('admin.asesmens.index')->with('success', 'Asesmen berhasil dihapus.');
    }
}
