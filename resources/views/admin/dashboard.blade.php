@extends('layouts.admin')

@section('title')
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Dashboard</p>
            <h1 class="text-2xl font-semibold text-slate-900">Ringkasan Admin</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Users</p>
            <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $metrics['users'] ?? 0 }}</p>
            <p class="mt-3 text-sm text-slate-400">Jumlah semua akun</p>
        </article>

        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Skema Sertifikasi</p>
            <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $metrics['skemas'] ?? 0 }}</p>
            <p class="mt-3 text-sm text-slate-400">Total skema yang terdaftar</p>
        </article>

        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Unit Kompetensi</p>
            <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $metrics['units'] ?? 0 }}</p>
            <p class="mt-3 text-sm text-slate-400">Unit kompetensi tersedia</p>
        </article>

        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pendaftaran</p>
            <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $metrics['pendaftaran'] ?? 0 }}</p>
            <p class="mt-3 text-sm text-slate-400">Aplikasi peserta</p>
        </article>

        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Asesmen</p>
            <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $metrics['asesmen'] ?? 0 }}</p>
            <p class="mt-3 text-sm text-slate-400">Jumlah proses asesmen</p>
        </article>
    </div>

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Ringkasan singkat</h2>
            <p class="mt-3 text-sm text-slate-500">Gunakan menu samping untuk mengakses CRUD users, skema sertifikasi, unit kompetensi, validasi pendaftaran, dan assign asesor.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Tips keamanan</h2>
            <ul class="mt-3 space-y-2 text-sm text-slate-500">
                <li>• Gunakan password kuat untuk akun admin.</li>
                <li>• Login hanya boleh dilakukan oleh role admin.</li>
                <li>• Semua input disaring oleh validasi Laravel.</li>
            </ul>
        </div>
    </div>
@endsection
