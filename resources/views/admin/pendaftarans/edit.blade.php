@extends('layouts.admin')

@section('title')
    <div>
        <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Pendaftaran</p>
        <h1 class="text-2xl font-semibold text-slate-900">Edit Pendaftaran</h1>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
        <form action="{{ route('admin.pendaftarans.update', $pendaftaran) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">Peserta</label>
                <select name="peserta_id" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    @foreach($pesertas as $peserta)
                        <option value="{{ $peserta->id }}" {{ old('peserta_id', $pendaftaran->peserta_id) == $peserta->id ? 'selected' : '' }}>{{ $peserta->user->name ?? 'N/A' }}</option>
                    @endforeach
                </select>
                @error('peserta_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Skema Sertifikasi</label>
                <select name="skema_id" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}" {{ old('skema_id', $pendaftaran->skema_id) == $skema->id ? 'selected' : '' }}>{{ $skema->nama_skema }}</option>
                    @endforeach
                </select>
                @error('skema_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar" value="{{ old('tanggal_daftar', $pendaftaran->tanggal_daftar->format('Y-m-d')) }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                @error('tanggal_daftar')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Status</label>
                <select name="status" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900" required>
                    <option value="pending" {{ old('status', $pendaftaran->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diterima" {{ old('status', $pendaftaran->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.pendaftarans.index') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Batal</a>
                <button type="submit" class="rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
