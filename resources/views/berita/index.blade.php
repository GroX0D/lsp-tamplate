@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-8">Berita</h1>
            <div class="space-y-6">
                @foreach($beritas as $berita)
                    <article class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <h2 class="text-2xl font-semibold">{{ $berita->title }}</h2>
                                <p class="text-sm text-gray-500">{{ $berita->published_at?->format('d M Y') }}</p>
                            </div>
                            <a href="{{ route('berita.show', $berita->slug) }}" class="rounded-2xl bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Baca Selengkapnya</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-8">{{ $beritas->links() }}</div>
        </div>
    </section>
@endsection
