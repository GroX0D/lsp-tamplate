<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-6">
    <div class="w-full max-w-md bg-white rounded-3xl border border-slate-200 shadow-lg p-8">
        <div class="mb-8 text-center">
            <p class="text-sm uppercase tracking-[0.22em] text-slate-500">Portal User</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">Masuk</h1>
            <p class="mt-2 text-sm text-slate-500">Masukkan email dan password Anda.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-slate-600 focus:ring-slate-500 border-slate-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-slate-700">Ingat saya</label>
            </div>
            <button type="submit" class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Masuk</button>
        </form>

        <div class="mt-6 text-center space-y-2">
            <p class="text-sm text-slate-600">
                Belum punya akun?
                <a href="#" class="font-medium text-slate-900 hover:text-slate-700">Daftar sekarang</a>
            </p>
            <p class="text-sm">
                <a href="{{ route('home') }}" class="font-medium text-slate-600 hover:text-slate-500">← Kembali ke beranda</a>
            </p>
        </div>
    </div>
</body>
</html>