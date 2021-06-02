<?php

use Illuminate\Support\Facades\Route;

//!!!!!!!!!!!!!!!!!!!!!! Controller jangan lupa diberi as untuk nama lain !!!!!!!!!!!!!!!!!!!!!!//
use App\Http\Controllers\Admin\AdminDashboardController as admin_AdminDashboardController;
use App\Http\Controllers\Admin\AdminController as admin_AdminController;
use App\Http\Controllers\Admin\AsesiController as admin_AsesiController;
use App\Http\Controllers\Admin\AsesorController as admin_AsesorController;
use App\Http\Controllers\Admin\KegiatanController as admin_KegiatanController;
use App\Http\Controllers\Admin\KuesionerController as admin_KuesionerController;
use App\Http\Controllers\Admin\ProdiController as admin_ProdiController;
use App\Http\Controllers\Admin\ReferensiNegaraController as admin_ReferensiNegaraController;
use App\Http\Controllers\Asesor\AsesorDashboardController as asesor_AsesorDashboardController;
use App\Http\Controllers\Asesor\AsesorController as asesor_AsesorController;
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
Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
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
});

// Route khusus asesor
Route::prefix('asesor')->middleware('auth', 'asesor')->group(function () {
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
});

require __DIR__.'/auth.php';
