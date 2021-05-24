<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AsesiController;
use App\Http\Controllers\Admin\AsesorController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\ReferensiNegaraController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route khusus admin
Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'showDashboard']);

    Route::prefix('kelola-admin')->group(function() {
        Route::get('/', [AdminController::class, 'show']);
        Route::get('/tambah', [AdminController::class, 'showCreate']);
        Route::post('/tambah', [AdminController::class, 'create']);
        Route::get('/edit', [AdminController::class, 'showEdit']);
        Route::put('/edit', [AdminController::class, 'edit']);
        Route::get('/edit/ganti-password', [AdminController::class, 'showChangePassword']);
        Route::put('/edit/ganti-password', [AdminController::class, 'changePassword']);
        Route::get('/{id}', [AdminController::class, 'read']);
        Route::get('/{id}/delete', [AdminController::class, 'del']);
    });

    Route::prefix('kelola-asesi')->group(function() {
        Route::get('/', [AsesiController::class, 'show']);
        Route::get('/tambah', [AsesiController::class, 'showCreate']);
        Route::post('/tambah', [AsesiController::class, 'create']);
        Route::get('/{id}', [AsesiController::class, 'read']);
        Route::get('/{id}/edit', [AsesiController::class, 'showEdit']);
        Route::put('/{id}/edit', [AsesiController::class, 'edit']);
        Route::get('/{id}/delete', [AsesiController::class, 'del']);
    });

    Route::prefix('kelola-asesor')->group(function() {
        Route::get('/', [AsesorController::class, 'show']);
        Route::get('/tambah', [AsesorController::class, 'showCreate']);
        Route::post('/tambah', [AsesorController::class, 'create']);
        Route::get('/{id}', [AsesorController::class, 'read']);
        Route::get('/{id}/edit', [AsesorController::class, 'showEdit']);
        Route::put('/{id}/edit', [AsesorController::class, 'edit']);
        Route::get('/{id}/delete', [AsesorController::class, 'del']);
    });

    Route::prefix('negara')->group(function () {
        Route::get('/', [ReferensiNegaraController::class, 'show']);
        Route::get('/tambah', [ReferensiNegaraController::class, 'showCreate']);
        Route::post('/tambah', [ReferensiNegaraController::class, 'create']);
        Route::get('/{id}', [ReferensiNegaraController::class, 'read']);
        Route::get('/{id}/edit', [ReferensiNegaraController::class, 'showEdit']);
        Route::put('/{id}/edit', [ReferensiNegaraController::class, 'edit']);
        Route::get('/{id}/delete', [ReferensiNegaraController::class, 'del']);
    });

    Route::prefix('prodi')->group(function() {
        Route::get('/', [ProdiController::class, 'show']);
        Route::get('/tambah', [ProdiController::class, 'showCreate']);
        Route::post('/tambah', [ProdiController::class, 'create']);
        Route::get('/{id}', [ProdiController::class, 'read']);
        Route::get('/{id}/edit', [ProdiController::class, 'showEdit']);
        Route::put('/{id}/edit', [ProdiController::class, 'edit']);
        Route::get('/{id}/delete', [ProdiController::class, 'del']);
    });
});

// Route khusus asesor
Route::prefix('asesor')->middleware('auth', 'asesor')->group(function () {
    Route::get('/', function () {
        return 'fini page khusus asesor';
    });
});

require __DIR__.'/auth.php';
