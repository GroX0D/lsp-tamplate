@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="py-20 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold">Kontak</h1>
                <p class="mt-3 text-gray-600">{{ $page->content ?? 'Hubungi kami melalui formulir di bawah.' }}</p>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 bg-white rounded-3xl p-8 shadow-sm">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3">
                    @error('nama')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3">
                    @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea name="pesan" rows="5" class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3">{{ old('pesan') }}</textarea>
                    @error('pesan')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="rounded-2xl bg-blue-600 px-6 py-3 text-white hover:bg-blue-700">Kirim Pesan</button>
            </form>
        </div>
    </section>
@endsection
