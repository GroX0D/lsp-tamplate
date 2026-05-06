@extends('layouts.admin')

@section('title')
    <div>
        <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Skema Sertifikasi</p>
        <h1 class="text-2xl font-semibold text-slate-900">Edit Skema</h1>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
        <form action="{{ route('admin.skemas.update', $skema) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">Nama Skema</label>
                <input type="text" name="nama_skema" value="{{ old('nama_skema', $skema->nama_skema) }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                @error('nama_skema')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
                @error('deskripsi')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tipe</label>
                <input type="text" name="tipe" value="{{ old('tipe', $skema->tipe) }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900">
                @error('tipe')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.skemas.index') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Batal</a>
                <button type="submit" class="rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
