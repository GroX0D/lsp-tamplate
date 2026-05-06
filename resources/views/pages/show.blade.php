@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-6">{{ $page->title }}</h1>
            <div class="prose max-w-none text-gray-700">{!! $page->content !!}</div>
        </div>
    </section>
@endsection
