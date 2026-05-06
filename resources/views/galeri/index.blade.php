@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <section class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-8">Galeri</h1>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($galeris as $item)
                    <article class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="h-72 w-full object-cover">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">{{ $item->title }}</h2>
                            <p class="mt-2 text-sm text-gray-500">{{ $item->created_at?->format('d M Y') }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-8">{{ $galeris->links() }}</div>
        </div>
    </section>
@endsection
