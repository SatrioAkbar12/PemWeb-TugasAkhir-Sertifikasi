<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
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
    Route::get('/negara', [ReferensiNegaraController::class, 'show']);
});

// Route khusus asesor
Route::prefix('asesor')->middleware('auth', 'asesor')->group(function () {
    Route::get('/', function () {
        return 'fini page khusus asesor';
    });
});

require __DIR__.'/auth.php';
