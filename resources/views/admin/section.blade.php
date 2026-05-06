@extends('layouts.admin')

@section('title')
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Panel Admin</p>
            <h1 class="text-2xl font-semibold text-slate-900">{{ $title }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
        <p class="text-slate-500">Halaman ini sudah terhubung dengan layout admin. Anda bisa menambahkan CRUD custom sesuai kebutuhan di sini.</p>
        <div class="mt-6 rounded-3xl bg-slate-50 p-6 text-sm text-slate-600 border border-slate-200">
            <p>Contoh: buat controller, model, route, dan blade khusus untuk {{ $title }}.</p>
        </div>
    </div>
@endsection
