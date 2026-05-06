<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.units.index', [
            'units' => UnitKompetensi::with('skemaSertifikasi')->orderBy('created_at', 'desc')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.units.create', [
            'skemas' => SkemaSertifikasi::orderBy('nama_skema')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
            'kode_unit' => ['required', 'string', 'max:255'],
            'nama_unit' => ['required', 'string', 'max:255'],
        ]);

        UnitKompetensi::create($data);

        return redirect()->route('admin.units.index')->with('success', 'Unit kompetensi berhasil ditambahkan.');
    }

    public function edit(UnitKompetensi $unit)
    {
        return view('admin.units.edit', [
            'unit' => $unit,
            'skemas' => SkemaSertifikasi::orderBy('nama_skema')->get(),
        ]);
    }

    public function update(Request $request, UnitKompetensi $unit)
    {
        $data = $request->validate([
            'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
            'kode_unit' => ['required', 'string', 'max:255'],
            'nama_unit' => ['required', 'string', 'max:255'],
        ]);

        $unit->update($data);

        return redirect()->route('admin.units.index')->with('success', 'Unit kompetensi berhasil diperbarui.');
    }

    public function destroy(UnitKompetensi $unit)
    {
        $unit->delete();

        return redirect()->route('admin.units.index')->with('success', 'Unit kompetensi berhasil dihapus.');
    }
}
