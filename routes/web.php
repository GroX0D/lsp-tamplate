<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AsesmenController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\SkemaController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
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
