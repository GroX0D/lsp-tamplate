@extends('layouts.admin')

@section('title')
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Skema Sertifikasi</p>
            <h1 class="text-2xl font-semibold text-slate-900">Daftar Skema Sertifikasi</h1>
        </div>
        <a href="{{ route('admin.skemas.create') }}" class="rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Tambah Skema</a>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-3xl bg-white border border-slate-200 shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Skema</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Dibuat</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach($skemas as $skema)
                    <tr>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $skema->nama_skema }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ \Illuminate\Support\Str::limit($skema->deskripsi, 60) }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $skema->tipe }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $skema->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('admin.skemas.edit', $skema) }}" class="text-slate-600 hover:text-slate-900">Edit</a>
                            <form action="{{ route('admin.skemas.destroy', $skema) }}" method="POST" class="inline-block ml-3" onsubmit="return confirm('Hapus skema ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $skemas->links() }}</div>
@endsection
