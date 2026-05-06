@extends('layouts.app')

@section('title', $settings->site_name ?? 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-slate-900 py-24 text-white">
        <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1400&q=80')] bg-cover bg-center"></div>
        <div class="relative max-w-6xl mx-auto px-4 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-slate-300">Selamat datang</p>
            <h1 class="mt-6 text-5xl font-bold">{{ $settings->site_name ?? 'LSP' }}</h1>
            <p class="mx-auto mt-6 max-w-3xl text-lg text-slate-200">{{ $settings->description ?? 'LSP siap membantu sertifikasi kompetensi Anda dengan layanan profesional dan transparan.' }}</p>
            <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('skema.index') }}" class="rounded-3xl bg-emerald-500 px-8 py-4 text-sm font-semibold uppercase tracking-[0.15em] text-white shadow-lg hover:bg-emerald-400">Lihat Skema</a>
                <a href="{{ route('contact.show') }}" class="rounded-3xl border border-slate-200 px-8 py-4 text-sm font-semibold uppercase tracking-[0.15em] text-white/90 hover:bg-white/10">Kontak Kami</a>
            </div>
        </div>
    </section>

    <!-- Skema Preview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold">Skema Terbaru</h2>
                <p class="mt-3 text-gray-600">Jelajahi skema sertifikasi yang tersedia untuk pengembangan karier Anda.</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($skemas->take(6) as $skema)
                    <article class="rounded-3xl border border-slate-200 p-6 shadow-sm">
                        <h3 class="text-xl font-semibold">{{ $skema->nama_skema }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $skema->kode_skema }}</p>
                        <p class="mt-4 text-sm leading-relaxed text-slate-700">{{ \Illuminate\Support\Str::limit($skema->deskripsi, 120) }}</p>
                        <div class="mt-5 flex items-center justify-between text-sm text-slate-600">
                            <span>Biaya: Rp {{ number_format($skema->biaya, 0, ',', '.') }}</span>
                            <a href="{{ route('skema.show', $skema) }}" class="font-semibold text-slate-900">Detail</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('skema.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                    Lihat Semua Skema →
                </a>
            </div>
        </div>
    </section>

    <!-- Berita Preview Section -->
    <section class="py-20 bg-slate-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold">Berita Terbaru</h2>
                <p class="mt-3 text-gray-600">Informasi terbaru tentang sertifikasi, pelatihan, dan kebijakan LSP.</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                @foreach($berita->take(4) as $item)
                    <article class="rounded-3xl bg-white p-6 shadow-sm">
                        <h3 class="text-2xl font-semibold">{{ $item->title }}</h3>
                        <p class="mt-3 text-sm text-slate-500">{{ $item->published_at?->format('d M Y') }}</p>
                        <p class="mt-4 text-sm leading-relaxed text-slate-700">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}</p>
                        <a href="{{ route('berita.show', $item->slug) }}" class="mt-5 inline-flex text-sm font-semibold text-emerald-600">Baca selengkapnya →</a>
                    </article>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                    Lihat Semua Berita →
                </a>
            </div>
        </div>
    </section>
@endsection