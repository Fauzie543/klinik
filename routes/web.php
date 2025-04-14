<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\petugas\PasienController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Manajemen User
    Route::resource('users', UserController::class);

    // Manajemen Pegawai
    Route::resource('pegawai', PegawaiController::class);

    // Manajemen Wilayah
    Route::resource('wilayah', WilayahController::class);

    // Manajemen Tindakan
    Route::resource('tindakan', TindakanController::class);

    // Manajemen Obat
    Route::resource('obat', ObatController::class);

    // Laporan
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/pendapatan', [LaporanController::class, 'laporanPendapatan'])->name('laporan.pendapatan');
    Route::get('laporan/tagihan', [LaporanController::class, 'laporanTagihan'])->name('laporan.tagihan');
    Route::get('laporan/pasien', [LaporanController::class, 'laporanPasien'])->name('laporan.pasien');
});

// Route untuk Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Pastikan route tambahan sesuai role lainnya
Route::middleware(['auth', 'role:petugas'])->prefix('pendaftaran')->name('pendaftaran.')->group(function () {
    Route::resource('pasien', PasienController::class);
});


Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('dokter/tindakan', [DokterController::class, 'tindakan'])->name('dokter.tindakan');
    Route::post('dokter/resep/{tindakan}', [DokterController::class, 'storeResep'])->name('dokter.resep.store');

});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('kasir/tagihan', [KasirController::class, 'index'])->name('kasir.tagihan');
});

// Route::resource('users', UserController::class)->middleware('auth');
// Route::resource('pegawai', PegawaiController::class)->middleware('auth');
// Route::resource('laporan', LaporanController::class)->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';