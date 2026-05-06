@extends('layouts.app')

@section('title', 'Skema Sertifikasi')

@section('content')
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-8">Skema Sertifikasi</h1>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($skemas as $skema)
                    <article class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h2 class="text-2xl font-semibold mb-2">{{ $skema->nama_skema }}</h2>
                        <p class="text-sm text-gray-600 mb-3">{{ $skema->kode_skema }}</p>
                        <p class="text-gray-700 mb-3">{{ \Illuminate\Support\Str::limit($skema->deskripsi, 120) }}</p>
                        <p class="text-sm text-gray-500 mb-4">Biaya: Rp {{ number_format($skema->biaya, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500 mb-4">Durasi: {{ $skema->durasi }}</p>
                        <a href="{{ route('skema.show', $skema) }}" class="inline-flex items-center rounded-2xl bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Lihat Detail</a>
                    </article>
                @endforeach
            </div>
            <div class="mt-8">{{ $skemas->links() }}</div>
        </div>
    </section>
@endsection
