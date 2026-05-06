@extends('layouts.admin')

@section('title')
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Pendaftaran</p>
            <h1 class="text-2xl font-semibold text-slate-900">Daftar Pendaftaran</h1>
        </div>
        <a href="{{ route('admin.pendaftarans.create') }}" class="rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Tambah Pendaftaran</a>
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
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Peserta</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Skema</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal Daftar</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach($pendaftarans as $pendaftaran)
                    <tr>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $pendaftaran->peserta->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $pendaftaran->skemaSertifikasi->nama_skema ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $pendaftaran->tanggal_daftar->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ ucfirst($pendaftaran->status) }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('admin.pendaftarans.edit', $pendaftaran) }}" class="text-slate-600 hover:text-slate-900">Edit</a>
                            <form action="{{ route('admin.pendaftarans.destroy', $pendaftaran) }}" method="POST" class="inline-block ml-3" onsubmit="return confirm('Hapus pendaftaran ini?');">
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

    <div class="mt-6">{{ $pendaftarans->links() }}</div>
@endsection
