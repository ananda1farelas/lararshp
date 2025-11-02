<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pemilik\PemilikDashboardController;
use App\Http\Controllers\Dokter\DokterDashboardController;

Route::get('/', function () {
    return view('tampilan.homepage');
});

Route::get('/homepage', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('homepage');
Route::get('/sejarah', [App\Http\Controllers\Site\SiteController::class, 'sejarah'])->name('sejarah');
Route::get('/visi', [App\Http\Controllers\Site\SiteController::class, 'visi'])->name('visi');
Route::get('/layanan', [App\Http\Controllers\Site\SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur', [App\Http\Controllers\Site\SiteController::class, 'struktur'])->name('struktur');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.process');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showForm'])->name('auth.register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register.store');

// Admin
Route::middleware(['auth.role:1'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::prefix('admin/datamaster')->name('admin.datamaster.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('index');
        // Role
        Route::resource('role', App\Http\Controllers\Admin\Datamaster\RoleController::class);
        Route::get('role/{idrole}/delete', [App\Http\Controllers\Admin\Datamaster\RoleController::class, 'delete'])->name('role.delete');
        // Role User
        Route::resource('role_user', App\Http\Controllers\Admin\Datamaster\RoleUserController::class);
        Route::get('role_user/{idrole_user}/delete', [App\Http\Controllers\Admin\Datamaster\RoleUserController::class, 'delete'])->name('role_user.delete');
        // Pet
        Route::resource('pet', App\Http\Controllers\Admin\DataMaster\PetController::class);
        Route::get('pet/{id}/delete', [App\Http\Controllers\Admin\DataMaster\PetController::class, 'delete'])->name('pet.delete');
        // Jenis Hewan
        Route::resource('jenishewan', App\Http\Controllers\Admin\DataMaster\JenisHewanController::class);
        Route::get('jenishewan/{id}/delete', [App\Http\Controllers\Admin\DataMaster\JenisHewanController::class, 'delete'])->name('jenishewan.delete');
        // Ras Hewan
        Route::resource('rashewan', App\Http\Controllers\Admin\DataMaster\RasHewanController::class);
        Route::get('rashewan/{id}/delete', [App\Http\Controllers\Admin\DataMaster\RasHewanController::class, 'delete'])->name('rashewan.delete');
        // Kategori
        Route::resource('kategori', App\Http\Controllers\Admin\DataMaster\KategoriController::class);
        Route::get('kategori/delete/{id}', [App\Http\Controllers\Admin\DataMaster\KategoriController::class, 'delete'])->name('kategori.delete');
        // Kategori Klinis
        Route::resource('kategoriklinis', App\Http\Controllers\Admin\DataMaster\KategoriKlinisController::class);
        Route::get('kategoriklinis/delete/{id}', [App\Http\Controllers\Admin\DataMaster\KategoriKlinisController::class, 'delete'])->name('kategoriklinis.delete');
        // Kode Tindakan Terapi
        Route::resource('kodetindakanterapi', App\Http\Controllers\Admin\DataMaster\KodeTindakanTerapiController::class);
        Route::get('kodetindakanterapi/delete/{id}', [App\Http\Controllers\Admin\DataMaster\KodeTindakanTerapiController::class, 'delete'])->name('kodetindakanterapi.delete');
    });
});
// Dokter
Route::middleware(['auth.role:2'])->group(function () {
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'dashboard'])->name('dokter.dashboard');
    Route::prefix('dokter/datamaster')->name('dokter.datamaster.')->group(function () {
        Route::get('/', [DokterDashboardController::class, 'index'])->name('index');
    });
});
// Perawat
Route::middleware(['auth.role:3'])->group(function () {
    Route::get('/perawat/dashboard', [App\Http\Controllers\Perawat\PerawatDashboardController::class, 'dashboard'])->name('perawat.dashboard');
    Route::prefix('perawat/datamaster')->name('perawat.datamaster.')->group(function () {
        Route::get('/', [App\Http\Controllers\Perawat\PerawatDashboardController::class, 'index'])->name('index');
        //rekam medis
        Route::resource('rekammedis', App\Http\Controllers\Perawat\Datamaster\RekamMedisController::class);
        Route::get('/perawat/reservasi/{id}', [App\Http\Controllers\Perawat\Datamaster\RekamMedisController::class, 'getReservasi'])->name('perawat.reservasi.get');
        Route::get('rekammedis/{id}/delete', [App\Http\Controllers\Perawat\Datamaster\RekamMedisController::class, 'delete'])->name('rekammedis.delete');
        //temudokter
        Route::resource('temudokter', App\Http\Controllers\Perawat\Datamaster\TemuDokterController::class);
        Route::get('temudokter/{id}/delete', [App\Http\Controllers\Perawat\Datamaster\TemuDokterController::class, 'delete'])->name('temudokter.delete');
        //detail rekam medis
        Route::resource('detailrekammedis', App\Http\Controllers\Perawat\Datamaster\DetailRekamMedisController::class);
        Route::get('detailrekammedis/rekam/{idrekam_medis}', [App\Http\Controllers\Perawat\Datamaster\DetailRekamMedisController::class, 'index'])->name('perawat.datamaster.detailrekammedis.byRekam');
        Route::get('detail_rekam_medis/{id}/delete', [App\Http\Controllers\Perawat\Datamaster\DetailRekamMedisController::class, 'delete'])->name('detail_rekam_medis.delete');
    });
});
// Resepsionis
Route::middleware(['auth.role:4'])->group(function () {
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\ResepsionisDashboardController::class, 'dashboard'])->name('resepsionis.dashboard');
    Route::prefix('resepsionis/datamaster')->name('resepsionis.datamaster.')->group(function () {
        Route::get('/', [App\Http\Controllers\Resepsionis\ResepsionisDashboardController::class, 'index'])->name('index');
        //pemilik
        Route::resource('pemilik', App\Http\Controllers\Resepsionis\DataMaster\PemilikController::class);
        Route::get('pemilik/{idpemilik}/delete', [App\Http\Controllers\Resepsionis\DataMaster\PemilikController::class, 'delete'])->name('pemilik.delete');
        //pet
        Route::resource('pet', App\Http\Controllers\Resepsionis\DataMaster\PetController::class);
        Route::get('pet/{id}/delete', [App\Http\Controllers\Resepsionis\DataMaster\PetController::class, 'delete'])->name('pet.delete');
        //temudokter
        Route::resource('temudokter', App\Http\Controllers\Resepsionis\DataMaster\TemuDokterController::class);
        Route::get('temudokter/{id}/delete', [App\Http\Controllers\Resepsionis\DataMaster\TemuDokterController::class, 'delete'])->name('temudokter.delete');
    });
});
// Pemilik
Route::middleware(['auth.role:5'])->group(function () {
    Route::get('/pemilik/dashboard', [PemilikDashboardController::class, 'dashboard'])->name('pemilik.dashboard');
    Route::prefix('pemilik/datamaster')->name('pemilik.datamaster.')->group(function () {
        Route::get('/', [PemilikDashboardController::class, 'index'])->name('index');

    });
});
