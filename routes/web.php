<?php

use Illuminate\Support\Facades\Route;

//!!!!!!!!!!!!!!!!!!!!!! Controller jangan lupa diberi as untuk nama lain !!!!!!!!!!!!!!!!!!!!!!//
use App\Http\Controllers\Admin\AdminDashboardController as admin_AdminDashboardController;
use App\Http\Controllers\Admin\AdminController as admin_AdminController;
use App\Http\Controllers\Admin\AsesiController as admin_AsesiController;
use App\Http\Controllers\Admin\AsesorController as admin_AsesorController;
use App\Http\Controllers\Admin\AsesorJenisSertifikasiController as admin_AsesorJenisSertifikasiController;
use App\Http\Controllers\Admin\InstrumenAsesmenKompetensiController as admin_InstrumenAsesmenKompetensiController;
use App\Http\Controllers\Admin\JadwalController as admin_JadwalController;
use App\Http\Controllers\Admin\JenisSertifikasiController as admin_JenisSertifikasiController;
use App\Http\Controllers\Admin\KegiatanController as admin_KegiatanController;
use App\Http\Controllers\Admin\KuesionerController as admin_KuesionerController;
use App\Http\Controllers\Admin\PenawaranSertifikasiController as admin_PenawaranSertifikasiController;
use App\Http\Controllers\Admin\ProdiController as admin_ProdiController;
use App\Http\Controllers\Admin\UnitKompetensiController as admin_UnitKompetensiController;
use App\Http\Controllers\Admin\UnitKompetensiSertifikasiController as admin_UnitKompetensiSertifikasiController;
use App\Http\Controllers\Admin\SyaratSertifikasiController as admin_SyaratSertifikasiController;
use App\Http\Controllers\Admin\ReferensiNegaraController as admin_ReferensiNegaraController;
use App\Http\Controllers\Asesor\AsesorDashboardController as asesor_AsesorDashboardController;
use App\Http\Controllers\Asesor\AsesorController as asesor_AsesorController;
use App\Http\Controllers\Asesor\AsesorPenilaianController as asesor_AsesorPenilaianController;
use App\Http\Controllers\Asesor\AsesorVerifikasiBerkasController as asesor_AsesorVerifikasiBerkasController;
use App\Http\Controllers\Asesi\AsesiDashboardController as asesi_AsesiDashboardController;
use App\Http\Controllers\Asesi\AsesiController as asesi_AsesiController;
use App\Http\Controllers\Asesi\AsesiIsiKuesionerController as asesi_AsesiIsiKuesionerController;
use App\Http\Controllers\Asesi\AsesiDaftarSertifikasiController as asesi_AsesiDaftarSertifikasiController;
use App\Http\Controllers\Asesi\AsesiSelfAsesmenController as asesi_AsesiSelfAsesmenController;
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('asesi.index');
})->middleware(['auth'])->name('dashboard');

// Route khusus admin
Route::prefix('admin')->middleware('auth', 'admin')->name('admin.')->group(function () {
    Route::get('/', [admin_AdminDashboardController::class, 'showDashboard']);

    Route::prefix('kelola-admin')->group(function() {
        Route::get('/', [admin_AdminController::class, 'show']);
        Route::get('/tambah', [admin_AdminController::class, 'showCreate']);
        Route::post('/tambah', [admin_AdminController::class, 'create']);
        Route::get('/edit', [admin_AdminController::class, 'showEdit']);
        Route::put('/edit', [admin_AdminController::class, 'edit']);
        Route::get('/edit/ganti-password', [admin_AdminController::class, 'showChangePassword']);
        Route::put('/edit/ganti-password', [admin_AdminController::class, 'changePassword']);
        Route::get('/{id}', [admin_AdminController::class, 'read']);
        Route::get('/{id}/delete', [admin_AdminController::class, 'del']);
    });

    Route::prefix('kelola-asesi')->group(function() {
        Route::get('/', [admin_AsesiController::class, 'show']);
        Route::get('/tambah', [admin_AsesiController::class, 'showCreate']);
        Route::post('/tambah', [admin_AsesiController::class, 'create']);
        Route::get('/{id}', [admin_AsesiController::class, 'read']);
        Route::get('/{id}/edit', [admin_AsesiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_AsesiController::class, 'edit']);
        Route::get('/{id}/delete', [admin_AsesiController::class, 'del']);
    });

    Route::prefix('kelola-asesor')->group(function() {
        Route::get('/', [admin_AsesorController::class, 'show']);
        Route::get('/tambah', [admin_AsesorController::class, 'showCreate']);
        Route::post('/tambah', [admin_AsesorController::class, 'create']);
        Route::get('/{id}', [admin_AsesorController::class, 'read']);
        Route::get('/{id}/edit', [admin_AsesorController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_AsesorController::class, 'edit']);
        Route::get('/{id}/delete', [admin_AsesorController::class, 'del']);
    });

    Route::prefix('negara')->group(function () {
        Route::get('/', [admin_ReferensiNegaraController::class, 'show']);
        Route::get('/tambah', [admin_ReferensiNegaraController::class, 'showCreate']);
        Route::post('/tambah', [admin_ReferensiNegaraController::class, 'create']);
        Route::get('/{id}', [admin_ReferensiNegaraController::class, 'read']);
        Route::get('/{id}/edit', [admin_ReferensiNegaraController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_ReferensiNegaraController::class, 'edit']);
        Route::get('/{id}/delete', [admin_ReferensiNegaraController::class, 'del']);
    });

    Route::prefix('prodi')->group(function() {
        Route::get('/', [admin_ProdiController::class, 'show']);
        Route::get('/tambah', [admin_ProdiController::class, 'showCreate']);
        Route::post('/tambah', [admin_ProdiController::class, 'create']);
        Route::get('/{id}', [admin_ProdiController::class, 'read']);
        Route::get('/{id}/edit', [admin_ProdiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_ProdiController::class, 'edit']);
        Route::get('/{id}/delete', [admin_ProdiController::class, 'del']);
    });

    Route::prefix('kegiatan')->group(function() {
        Route::get('/', [admin_KegiatanController::class, 'index']);
        Route::get('/tambah', [admin_KegiatanController::class, 'showCreate']);
        Route::post('/tambah', [admin_KegiatanController::class, 'create']);
        Route::get('/{id}', [admin_KegiatanController::class, 'read']);
        Route::get('/{id}/edit', [admin_KegiatanController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_KegiatanController::class, 'edit']);
        Route::get('/{id}/delete', [admin_KegiatanController::class, 'del']);
    });

    Route::prefix('kuesioner')->group(function() {
        Route::get('/', [admin_KuesionerController::class, 'index']);
        Route::get('/tambah', [admin_KuesionerController::class, 'showCreate']);
        Route::post('/tambah', [admin_KuesionerController::class, 'create']);
        Route::get('/{id}', [admin_KuesionerController::class, 'read']);
        Route::get('/{id}/edit', [admin_KuesionerController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_KuesionerController::class, 'edit']);
        Route::get('/{id}/delete', [admin_KuesionerController::class, 'del']);
    });

    Route::prefix('unitKompetensi')->group(function() {
        Route::get('/', [admin_UnitKompetensiController::class, 'index']);
        Route::get('/tambah', [admin_UnitKompetensiController::class, 'showCreate']);
        Route::post('/tambah', [admin_UnitKompetensiController::class, 'create']);
        Route::get('/{id}', [admin_UnitKompetensiController::class, 'read']);
        Route::get('/{id}/edit', [admin_UnitKompetensiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_UnitKompetensiController::class, 'edit']);
        Route::get('/{id}/delete', [admin_UnitKompetensiController::class, 'del']);
    });

    Route::prefix('jenis-sertifikasi')->group(function() {
        Route::get('/', [admin_JenisSertifikasiController::class, 'index']);
        Route::get('/tambah', [admin_JenisSertifikasiController::class, 'showCreate']);
        Route::post('/tambah', [admin_JenisSertifikasiController::class, 'create']);
        Route::get('/{id}', [admin_JenisSertifikasiController::class, 'read']);
        Route::get('/{id}/edit', [admin_JenisSertifikasiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_JenisSertifikasiController::class, 'edit']);
        Route::get('/{id}/delete', [admin_JenisSertifikasiController::class, 'del']);
    });

    Route::prefix('asesor-jenis-sertifikasi')->group(function() {
        Route::get('/', [admin_AsesorJenisSertifikasiController::class, 'index']);
        Route::get('{id}', [admin_AsesorJenisSertifikasiController::class, 'read']);
        Route::get('/{id}/edit', [admin_AsesorJenisSertifikasiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_AsesorJenisSertifikasiController::class, 'edit']);
    });

    Route::prefix('penawaran-sertifikasi')->group(function() {
        Route::get('/', [admin_PenawaranSertifikasiController::class, 'index']);
        Route::get('/tambah', [admin_PenawaranSertifikasiController::class, 'showCreate']);
        Route::post('/tambah', [admin_PenawaranSertifikasiController::class, 'create']);
        Route::get('/{id}', [admin_PenawaranSertifikasiController::class, 'read']);
        Route::get('/{id}/edit', [admin_PenawaranSertifikasiController::class, 'showEdit']);
        Route::put('/{id}/edit', [admin_PenawaranSertifikasiController::class, 'edit']);
        Route::get('/{id}/delete', [admin_PenawaranSertifikasiController::class, 'del']);
    });

    Route::prefix('jadwal')->name('jadwal.')->group(function() {
        Route::get('/', [admin_JadwalController::class, 'index'])->name('index');
        Route::get('/tambah', [admin_JadwalController::class, 'showCreate'])->name('show-create');
        Route::post('/tambah', [admin_JadwalController::class, 'create'])->name('create');
        Route::prefix('{id_penawaranSertifikasi}')->name('kegiatan.')->group(function() {
            Route::get('/', [admin_JadwalController::class, 'read'])->name('read');
            Route::get('/kegiatan/{id_jadwal}', [admin_JadwalController::class, 'readKegiatan'])->name('read-kegiatan');
            Route::get('/kegiatan/{id_jadwal}/edit', [admin_JadwalController::class, 'showEdit'])->name('show-edit');
            Route::put('/kegiatan/{id_jadwal}/edit', [admin_JadwalController::class, 'edit'])->name('edit');
            Route::get('/kegiatan/{id_jadwal}/delete', [admin_JadwalController::class, 'del'])->name('delete');
        });
    });

    Route::prefix('unit-kompetensi-sertifikasi')->name('unit_kompetensi_sertifikasi.')->group(function() {
        Route::get('/', [admin_UnitKompetensiSertifikasiController::class, 'index'])->name('index');
        Route::get('/tambah', [admin_UnitKompetensiSertifikasiController::class, 'showCreate'])->name('show-create');
        Route::post('/tambah', [admin_UnitKompetensiSertifikasiController::class, 'create'])->name('create');
        Route::get('/{id}', [admin_UnitKompetensiSertifikasiController::class, 'read'])->name('read');
        Route::get('/{id}/edit', [admin_UnitKompetensiSertifikasiController::class, 'showEdit'])->name('show-edit');
        Route::put('/{id}/edit', [admin_UnitKompetensiSertifikasiController::class, 'edit'])->name('edit');
        Route::get('/{id}/delete', [admin_UnitKompetensiSertifikasiController::class, 'del'])->name('delete');
    });

    Route::prefix('syarat-sertifikasi')->name('syarat_sertifikasi.')->group(function() {
        Route::get('/', [admin_SyaratSertifikasiController::class, 'index'])->name('index');
        Route::get('/tambah', [admin_SyaratSertifikasiController::class, 'showCreate'])->name('show-create');
        Route::post('/tambah', [admin_SyaratSertifikasiController::class, 'create'])->name('create');
        Route::get('/{id}', [admin_SyaratSertifikasiController::class, 'read'])->name('read');
        Route::get('/{id}/edit', [admin_SyaratSertifikasiController::class, 'showEdit'])->name('show-edit');
        Route::put('/{id}/edit', [admin_SyaratSertifikasiController::class, 'edit'])->name('edit');
        Route::get('/{id}/delete', [admin_SyaratSertifikasiController::class, 'del'])->name('delete');
    });

    Route::prefix('instrumen-asesmen')->name('instrumen-asesmen.')->group(function() {
        Route::get('/', [admin_InstrumenAsesmenKompetensiController::class, 'index'])->name('index');
        Route::get('/tambah', [admin_InstrumenAsesmenKompetensiController::class, 'showCreate'])->name('show-create');
        Route::post('/tambah', [admin_InstrumenAsesmenKompetensiController::class, 'create'])->name('create');
        Route::get('/{id}', [admin_InstrumenAsesmenKompetensiController::class, 'read'])->name('read');
        Route::get('/{id}/edit', [admin_InstrumenAsesmenKompetensiController::class, 'showEdit'])->name('show-edit');
        Route::put('/{id}/edit', [admin_InstrumenAsesmenKompetensiController::class, 'edit'])->name('edit');
        Route::get('/{id}/delete', [admin_InstrumenAsesmenKompetensiController::class, 'del'])->name('delete');
    });
});

// Route khusus asesor
Route::prefix('asesor')->middleware('auth', 'asesor')->name('asesor.')->group(function () {
    Route::get('/', [asesor_AsesorDashboardController::class, 'showDashboard']);

    Route::prefix('lihat-data')->group(function() {
        Route::get('/', [asesor_AsesorController::class, 'show']);
        // Route::get('/tambah', [asesor_AsesorController::class, 'showCreate']);
        // Route::post('/tambah', [asesor_AsesorController::class, 'create']);
       // Route::get('/{id}', [asesor_AsesorController::class, 'read']);
        // Route::get('/{id}/edit', [asesor_AsesorController::class, 'showEdit']);
        // Route::put('/{id}/edit', [asesor_AsesorController::class, 'edit']);
        // Route::get('/{id}/delete', [asesor_AsesorController::class, 'del']);
    });

    Route::prefix('edit-data')->group(function() {
        Route::get('/', [asesor_AsesorController::class, 'showEdit']);
        Route::put('/edit', [asesor_AsesorController::class, 'edit']);

    });

    Route::prefix('verifikasi-berkas')->group(function() {
        Route::get('/', [asesor_AsesorVerifikasiBerkasController::class, 'index']);
        Route::put('/edit', [asesor_AsesorController::class, 'edit']);

    });

    Route::prefix('nilai-asesi')->group(function() {
        Route::get('/', [asesor_AsesorPenilaianController::class, 'index']);
        Route::put('/edit', [asesor_AsesorController::class, 'edit']);

    });
});

// Route khusus asesi
Route::prefix('asesi')->middleware('auth', 'asesi')->name('asesi.')->group(function () {
    Route::get('/', [asesi_AsesiDashboardController::class, 'showDashboard']);

    Route::prefix('lihat-data')->group(function() {
        Route::get('/', [asesi_AsesiController::class, 'show']);
        // Route::get('/tambah', [asesor_AsesorController::class, 'showCreate']);
        // Route::post('/tambah', [asesor_AsesorController::class, 'create']);
       // Route::get('/{id}', [asesor_AsesorController::class, 'read']);
        // Route::get('/{id}/edit', [asesor_AsesorController::class, 'showEdit']);
        // Route::put('/{id}/edit', [asesor_AsesorController::class, 'edit']);
        // Route::get('/{id}/delete', [asesor_AsesorController::class, 'del']);
    });

    Route::prefix('edit-data')->group(function() {
        Route::get('/', [asesi_AsesiController::class, 'showEdit']);
        Route::put('/edit', [asesi_AsesiController::class, 'edit']);

    });

    // Route::prefix('nilai-asesi')->group(function() {
    //     Route::get('/', [asesi_AsesiController::class, 'show_nilai']);
    //     Route::put('/edit', [asesi_AsesiController::class, 'edit']);

    // });
    Route::prefix('isikuesioner')->group(function() {
        Route::get('/', [asesi_AsesiIsiKuesionerController::class, 'index']);
        Route::get('/{id}/jawab', [asesi_AsesiIsiKuesionerController::class, 'showJawab']);
        Route::post('/{id}/jawab', [asesi_AsesiIsiKuesionerController::class, 'jawab']);

    });

    Route::prefix('daftarsertifikasi')->group(function() {
        Route::get('/', [asesi_AsesiDaftarSertifikasiController::class, 'index']);
    });
    Route::prefix('self-asesmen')->group(function() {
        Route::get('/', [asesi_AsesiSelfAsesmenController::class, 'index']);
        Route::get('/{id}/jawab', [asesi_AsesiSelfAsesmenController::class, 'showJawab']);
        Route::post('/{id}/jawab', [asesi_AsesiSelfAsesmenController::class, 'jawab']);
    });
});

require __DIR__.'/auth.php';
