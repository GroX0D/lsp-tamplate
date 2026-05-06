<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SkemaController extends Controller
{
    public function index()
    {
        return view('admin.skemas.index', [
            'skemas' => SkemaSertifikasi::orderBy('created_at', 'desc')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.skemas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_skema' => ['required', 'string', 'max:255'],
            'kode_skema' => ['required', 'string', 'max:255', 'unique:skema_sertifikasi,kode_skema'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        SkemaSertifikasi::create($data);

        return redirect()->route('admin.skemas.index')->with('success', 'Skema berhasil disimpan.');
    }

    public function edit(SkemaSertifikasi $skema)
    {
        return view('admin.skemas.edit', compact('skema'));
    }

    public function update(Request $request, SkemaSertifikasi $skema)
    {
        $data = $request->validate([
            'nama_skema' => ['required', 'string', 'max:255'],
            'kode_skema' => ['required', 'string', 'max:255', Rule::unique('skema_sertifikasi', 'kode_skema')->ignore($skema->id)],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $skema->update($data);

        return redirect()->route('admin.skemas.index')->with('success', 'Skema berhasil diperbarui.');
    }

    public function destroy(SkemaSertifikasi $skema)
    {
        $skema->delete();

        return redirect()->route('admin.skemas.index')->with('success', 'Skema berhasil dihapus.');
    }
}
