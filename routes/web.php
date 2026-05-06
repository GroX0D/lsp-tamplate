<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AsesmenController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\SkemaController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\GaleriController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\PendaftaranPublicController;
use App\Http\Controllers\Public\SkemaController as PublicSkemaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/skema', [PublicSkemaController::class, 'index'])->name('skema.index');
Route::get('/skema/{skema}', [PublicSkemaController::class, 'show'])->name('skema.show');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/kontak', [ContactController::class, 'show'])->name('contact.show');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');
Route::post('/pendaftaran', [PendaftaranPublicController::class, 'store'])->name('pendaftaran.store');

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});

Route::middleware([EnsureAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('skemas', SkemaController::class)->except(['show']);
    Route::resource('units', UnitController::class)->except(['show']);
    Route::resource('pendaftarans', PendaftaranController::class)->except(['show']);
    Route::resource('asesmens', AsesmenController::class)->except(['show']);
});

// Catch-all route harus di akhir agar tidak mengganggu routes spesifik
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
