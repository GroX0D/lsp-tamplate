@extends('layouts.admin')

@section('title')
    <div>
        <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Asesmen</p>
        <h1 class="text-2xl font-semibold text-slate-900">Edit Asesmen</h1>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
        <form action="{{ route('admin.asesmens.update', $asesmen) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">Pendaftaran</label>
                <select name="pendaftaran_id" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    @foreach($pendaftarans as $pendaftaran)
                        <option value="{{ $pendaftaran->id }}" {{ old('pendaftaran_id', $asesmen->pendaftaran_id) == $pendaftaran->id ? 'selected' : '' }}>{{ $pendaftaran->peserta->user->name ?? 'N/A' }} - {{ $pendaftaran->skemaSertifikasi->nama_skema ?? 'N/A' }}</option>
                    @endforeach
                </select>
                @error('pendaftaran_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Asesor</label>
                <select name="asesor_id" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    @foreach($asesors as $asesor)
                        <option value="{{ $asesor->id }}" {{ old('asesor_id', $asesmen->asesor_id) == $asesor->id ? 'selected' : '' }}>{{ $asesor->user->name ?? 'N/A' }}</option>
                    @endforeach
                </select>
                @error('asesor_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tanggal Asesmen</label>
                <input type="date" name="tanggal_asesmen" value="{{ old('tanggal_asesmen', $asesmen->tanggal_asesmen->format('Y-m-d')) }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                @error('tanggal_asesmen')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Hasil</label>
                <select name="hasil" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    <option value="kompeten" {{ old('hasil', $asesmen->hasil) == 'kompeten' ? 'selected' : '' }}>Kompeten</option>
                    <option value="belum_kompeten" {{ old('hasil', $asesmen->hasil) == 'belum_kompeten' ? 'selected' : '' }}>Belum Kompeten</option>
                </select>
                @error('hasil')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Catatan</label>
                <textarea name="catatan" rows="4" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900">{{ old('catatan', $asesmen->catatan) }}</textarea>
                @error('catatan')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.asesmens.index') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Batal</a>
                <button type="submit" class="rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
