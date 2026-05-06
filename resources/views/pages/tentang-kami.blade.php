@extends('layouts.app')

@section('title', 'Tentang Kami - ' . ($settings->site_name ?? 'LSP'))

@section('content')
    <!-- Hero Section -->
    <section class="pt-20 pb-12 bg-slate-900 text-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Tentang Kami</h1>
            <p class="text-xl text-slate-300">Mengenal lebih dekat dengan LSP dan tim profesional kami</p>
        </div>
    </section>

    <!-- Asesor Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold">Asesor Pilihan</h2>
                <p class="mt-3 text-gray-600">Tim asesor terpercaya yang siap mendukung proses sertifikasi Anda.</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($asesors as $asesor)
                    <article class="rounded-3xl border border-slate-200 p-6 text-center shadow-sm">
                        @if($asesor->foto)
                            <img src="{{ $asesor->foto }}" alt="{{ $asesor->nama }}" class="mx-auto mb-4 h-32 w-32 rounded-full object-cover">
                        @endif
                        <h3 class="text-xl font-semibold">{{ $asesor->nama }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $asesor->bidang_keahlian }}</p>
                        <p class="mt-4 text-sm leading-relaxed text-slate-700">{{ \Illuminate\Support\Str::limit($asesor->deskripsi, 120) }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section class="py-20 bg-slate-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold">Testimoni</h2>
                <p class="mt-3 text-gray-600">Pendapat peserta yang sudah mengikuti sertifikasi.</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                @foreach($testimoni as $item)
                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <p class="text-xl font-semibold text-slate-900">"{{ $item->isi }}"</p>
                        <div class="mt-4 flex items-center justify-between text-sm text-slate-600">
                            <span>{{ $item->nama }}</span>
                            <span>{{ str_repeat('★', min($item->rating, 5)) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold">FAQ</h2>
                <p class="mt-3 text-gray-600">Pertanyaan umum tentang layanan dan sertifikasi.</p>
            </div>
            <div class="space-y-4">
                @foreach($faq as $item)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <h3 class="font-semibold text-slate-900">{{ $item->pertanyaan }}</h3>
                        <p class="mt-3 text-slate-700">{{ $item->jawaban }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection