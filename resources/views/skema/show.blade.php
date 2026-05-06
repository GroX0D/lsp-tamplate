@extends('layouts.app')

@section('title', $skema->nama_skema)

@section('content')
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4">
            <div class="mb-8">
                <h1 class="text-4xl font-bold">{{ $skema->nama_skema }}</h1>
                <p class="mt-2 text-gray-600">Kode: {{ $skema->kode_skema }}</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-2">
                <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-semibold mb-4">Deskripsi</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $skema->deskripsi }}</p>
                </div>
                <div class="space-y-4 rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">
                    <div>
                        <h3 class="text-lg font-semibold">Biaya</h3>
                        <p class="text-gray-700">Rp {{ number_format($skema->biaya, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Durasi</h3>
                        <p class="text-gray-700">{{ $skema->durasi }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Unit Kompetensi</h3>
                        <ul class="list-disc pl-5 text-gray-700">
                            @foreach($skema->unitKompetensi as $unit)
                                <li>{{ $unit->kode_unit }} - {{ $unit->nama_unit }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
