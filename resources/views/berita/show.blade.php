@extends('layouts.app')

@section('title', $berita->title)

@section('content')
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4">
            <article class="rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">
                <h1 class="text-4xl font-bold mb-4">{{ $berita->title }}</h1>
                <p class="text-sm text-gray-500 mb-6">Dipublikasikan pada {{ $berita->published_at?->format('d M Y') }}</p>
                @if($berita->thumbnail)
                    <img src="{{ $berita->thumbnail }}" alt="{{ $berita->title }}" class="mb-6 w-full rounded-3xl object-cover">
                @endif
                <div class="prose max-w-none text-gray-700">{!! $berita->content !!}</div>
            </article>
        </div>
    </section>
@endsection
