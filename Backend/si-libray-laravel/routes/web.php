<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cari-buku', [App\Http\Controllers\CariBukuController::class, 'index'])->name('cari-buku');
Route::post('/cari-buku', [App\Http\Controllers\CariBukuController::class, 'search'])->name('cari-buku-keyword');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/cek-tagihan', [App\Http\Controllers\TagihanController::class, 'index'])->name('cek-tagihan');  
});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashoard');
        Route::resource('buku', BukuController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('dosen', DosenController::class);
        Route::resource('pengunjung-umum', PengunjungUmumController::class);
        Route::resource('peminjaman', PeminjamanController::class);
        Route::get('/peminjaman/{id_peminjaman}/success', [App\Http\Controllers\Admin\PeminjamanController::class, 'success'])->name('peminjaman-success');
        Route::resource('pengembalian', PengembalianController::class);
        Route::get('/cek-tanggungan', [App\Http\Controllers\Admin\TanggunganController::class, 'index'])->name('cek-tanggungan');
        Route::get('/laporan-peminjaman/{bulan}', [App\Http\Controllers\Admin\LaporanPeminjamanController::class, 'index'])->name('laporan-peminjaman');
        Route::post('/laporan-peminjaman', [App\Http\Controllers\Admin\LaporanPeminjamanController::class, 'show'])->name('laporan-peminjaman-bulan');
        Route::get('/laporan-pengembalian/{bulan}', [App\Http\Controllers\Admin\LaporanPengembalianController::class, 'index'])->name('laporan-pengembalian');
        Route::post('/laporan-pengembalian', [App\Http\Controllers\Admin\LaporanPengembalianController::class, 'show'])->name('laporan-pengembalian-bulan');
    });

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
