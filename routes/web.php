<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
/*
|--------------------------------------------------------------------------
| ROUTE UNTUK WARGA
|--------------------------------------------------------------------------
*/

// Dashboard Warga
Route::get('/dashboard-warga', [LaporanController::class, 'wargaIndex'])
    ->middleware('auth')
    ->name('dashboard.warga');

// Form Laporan (buat laporan baru)
Route::get('/laporan', [LaporanController::class, 'index'])
    ->middleware('auth')
    ->name('laporan.index');
Route::post('/laporan', [LaporanController::class, 'store'])
    ->middleware('auth')
    ->name('laporan.store');

// Detail, Edit, Hapus laporan milik warga
Route::get('/laporan/{id}', [LaporanController::class, 'show'])
    ->middleware('auth')
    ->name('laporan.show');
Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])
    ->middleware('auth')
    ->name('laporan.edit');
Route::put('/laporan/{id}', [LaporanController::class, 'update'])
    ->middleware('auth')
    ->name('laporan.update');
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])
    ->middleware('auth')
    ->name('laporan.destroy');



Route::middleware(['auth'])->group(function () {

    // HALAMAN PROFIL
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');

    // ➜ HALAMAN EDIT PROFIL
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');

    // UPDATE DATA PROFIL
    Route::post('/profil/update', [ProfileController::class, 'updateProfile'])->name('profil.update');

    // UPDATE FOTO PROFIL
    Route::post('/profil/update-foto', [ProfileController::class, 'updatePhoto'])->name('profil.update.photo');

    // HALAMAN KEAMANAN
    Route::get('/profil/keamanan', [ProfileController::class, 'security'])->name('profil.security');

    // UPDATE PASSWORD
    Route::post('/profil/update-password', [ProfileController::class, 'updatePassword'])->name('profil.update.password');

});


/*
|--------------------------------------------------------------------------
| ROUTE UNTUK ADMIN
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard admin
    Route::get('/dashboard-admin', [LaporanController::class, 'adminIndex'])
        ->name('dashboard.admin');

    // Detail laporan admin
    Route::get('/admin/laporan/{id_laporan}', [LaporanController::class, 'adminShow'])
        ->name('admin.laporan.show');

    // Update status laporan
    Route::post('/admin/laporan/{id_laporan}/status', [LaporanController::class, 'updateStatus'])
        ->name('admin.laporan.updateStatus');

    Route::delete('/admin/laporan/{id}', [LaporanController::class, 'destroy'])
    ->name('admin.laporan.destroy')
    ->middleware('admin');

});



/*
|--------------------------------------------------------------------------
| ROUTE UNTUK HALAMAN UMUM
|--------------------------------------------------------------------------
*/
// Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/navbar', fn() => view('navbar'));
Route::get('/', fn() => view('dashboard'))->name('dashboard');


/*
|--------------------------------------------------------------------------
| ROUTE UNTUK AUTENTIKASI
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tutorial Warga
Route::get('/tutorial', [\App\Http\Controllers\TutorialController::class, 'index'])
     ->name('tutorial.index')
     ->middleware('auth');

// Halaman Informasi Warga
Route::get('/informasi', [\App\Http\Controllers\InformasiController::class, 'index'])
    ->name('informasi.index')
    ->middleware('auth');

    Route::middleware(['auth'])->prefix('admin')->group(function () {

 

    // KELola pengguna
    Route::get('/pengguna', [App\Http\Controllers\Admin\UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/pengguna/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::put('/pengguna/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/pengguna/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])
        ->name('admin.users.destroy');
});
