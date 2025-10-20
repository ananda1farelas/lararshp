<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataMasterController;
use App\Http\Controllers\Admin\datamaster\RoleController;
use App\Http\Controllers\Admin\datamaster\RoleUserController;
use App\Http\Controllers\Admin\DataMaster\PetController;
use App\Http\Controllers\Admin\DataMaster\RasHewanController;
use App\Http\Controllers\Admin\datamaster\JenisHewanController;
use App\Http\Controllers\Admin\datamaster\KategoriController;
use App\Http\Controllers\Admin\datamaster\KategoriKlinisController;
use App\Http\Controllers\Admin\datamaster\KodeTindakTerapiController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [SiteController::class, 'index'])->name('homepage');
Route::get('/sejarah', [SiteController::class, 'sejarah'])->name('sejarah');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh dashboard per role
Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/dokter/dashboard', fn() => view('dokter.dashboard'))->name('dokter.dashboard');
Route::get('/perawat/dashboard', fn() => view('perawat.dashboard'))->name('perawat.dashboard');
Route::get('/resepsionis/dashboard', fn() => view('resepsionis.dashboard'))->name('resepsionis.dashboard');
Route::get('/pemilik/dashboard', fn() => view('pemilik.dashboard'))->name('[pemilik.dashboard');

Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Data Master
Route::prefix('admin/datamaster')->group(function () {
    Route::get('/', [DataMasterController::class, 'index'])->name('admin.datamaster');
    Route::get('/role', [RoleController::class, 'role'])->name('admin.datamaster.role');
    Route::get('/role_user', [RoleUserController::class, 'roleuser'])->name('admin.datamaster.role_user');
    Route::get('/pet', [PetController::class, 'pet'])->name('admin.datamaster.pet');
    Route::get('admin/datamaster/jenis_hewan', [JenisHewanController::class, 'jenisHewan'])->name('admin.datamaster.jenis_hewan');
    Route::get('/ras_hewan', [RasHewanController::class, 'rasHewan'])->name('admin.datamaster.ras_hewan');
    Route::get('/kategori', [KategoriController::class, 'kategori'])->name('admin.datamaster.kategori');
    Route::get('/kategori_klinis', [KategoriKlinisController::class, 'kategoriKlinis'])->name('admin.datamaster.kategori_klinis');
    Route::get('/kode_tindakan_terapi', [DataMasterController::class, 'kodeTindakanTerapi'])->name('admin.datamaster.kode_tindakan_terapi');
});


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
