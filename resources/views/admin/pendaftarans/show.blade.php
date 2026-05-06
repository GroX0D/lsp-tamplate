@extends('layouts.admin')

@section('title')
    <div>
        <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Pendaftaran</p>
        <h1 class="text-2xl font-semibold text-slate-900">Detail Pendaftaran</h1>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="space-y-4 rounded-3xl bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Informasi Peserta</h2>
                <p><span class="font-medium">Nama:</span> {{ $pendaftaran->peserta->user->name ?? 'N/A' }}</p>
                <p><span class="font-medium">Email:</span> {{ $pendaftaran->peserta->user->email ?? 'N/A' }}</p>
            </div>

            <div class="space-y-4 rounded-3xl bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Informasi Skema</h2>
                <p><span class="font-medium">Skema:</span> {{ $pendaftaran->skemaSertifikasi->nama_skema ?? 'N/A' }}</p>
                <p><span class="font-medium">Tanggal Daftar:</span> {{ $pendaftaran->tanggal_daftar->format('d M Y') }}</p>
                <p><span class="font-medium">Status:</span> {{ ucfirst($pendaftaran->status) }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.pendaftarans.index') }}" class="rounded-2xl border border-slate-300 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Kembali</a>
        </div>
    </div>
@endsection
