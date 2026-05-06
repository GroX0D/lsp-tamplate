@extends('layouts.admin')

@section('title')
    <div>
        <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Asesmen</p>
        <h1 class="text-2xl font-semibold text-slate-900">Detail Asesmen</h1>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="space-y-4 rounded-3xl bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Informasi Pendaftaran</h2>
                <p><span class="font-medium">Peserta:</span> {{ $asesmen->pendaftaran->peserta->user->name ?? 'N/A' }}</p>
                <p><span class="font-medium">Skema:</span> {{ $asesmen->pendaftaran->skemaSertifikasi->nama_skema ?? 'N/A' }}</p>
            </div>

            <div class="space-y-4 rounded-3xl bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Informasi Asesmen</h2>
                <p><span class="font-medium">Asesor:</span> {{ $asesmen->asesor->user->name ?? 'N/A' }}</p>
                <p><span class="font-medium">Tanggal:</span> {{ $asesmen->tanggal_asesmen->format('d M Y') }}</p>
                <p><span class="font-medium">Hasil:</span> {{ ucfirst(str_replace('_', ' ', $asesmen->hasil)) }}</p>
            </div>
        </div>

        <div class="mt-6 rounded-3xl bg-slate-50 p-6">
            <h2 class="text-lg font-semibold text-slate-900">Catatan</h2>
            <p class="text-sm leading-6 text-slate-700">{{ $asesmen->catatan ?? 'Tidak ada catatan tambahan.' }}</p>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.asesmens.index') }}" class="rounded-2xl border border-slate-300 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Kembali</a>
        </div>
    </div>
@endsection
