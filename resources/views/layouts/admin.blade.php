<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="flex min-h-screen bg-slate-100 text-slate-900">

    <aside class="w-72 bg-slate-900 text-slate-100 flex flex-col justify-between">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-8">Admin Panel</h1>

            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.users.*') ? 'bg-slate-800' : '' }}">
                    Users
                </a>
                <a href="{{ route('admin.skemas.index') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.skemas.*') ? 'bg-slate-800' : '' }}">
                    Skema Sertifikasi
                </a>
                <a href="{{ route('admin.units.index') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.units.*') ? 'bg-slate-800' : '' }}">
                    Unit Kompetensi
                </a>
                <a href="{{ route('admin.pendaftarans.index') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.pendaftarans.*') ? 'bg-slate-800' : '' }}">
                    Pendaftaran
                </a>
                <a href="{{ route('admin.asesmens.index') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.asesmens.*') ? 'bg-slate-800' : '' }}">
                    Asesmen
                </a>
            </nav>
        </div>

        <div class="p-6 border-t border-slate-700">
            <div class="mb-4 text-sm text-slate-300">
                <p class="uppercase tracking-[0.18em] text-slate-500">Masuk sebagai</p>
                <p class="mt-2 text-base font-semibold text-slate-100">{{ Auth::user()->name ?? 'Administrator' }}</p>
                <p class="text-sm text-slate-400">{{ Auth::user()->email ?? '' }}</p>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full rounded-xl bg-rose-600 px-4 py-3 text-sm font-semibold text-white hover:bg-rose-500 transition">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white border-b border-slate-200 px-6 py-4 shadow-sm">
            @yield('title')
        </header>

        <main class="p-6 overflow-auto bg-slate-50 h-full">
            @yield('content')
        </main>
    </div>

</body>
</html>
