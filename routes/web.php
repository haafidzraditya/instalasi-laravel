<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('apa');

Route::get('/template', function () {
    return view('template.master');
});

Route::get('/data', function () {
    return view('template.data');
});

// Bagian Spp
Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
Route::get('/spp/create', [SppController::class, 'create'])->name('spp.create');
Route::post('/spp', [SppController::class, 'store'])->name('spp.store');

Route::get('/spp/{id}', [SppController::class, 'show'])->name('spp.show');

Route::get('/spp/{id}/edit', [SppController::class, 'edit'])->name('spp.edit');
Route::put('/spp/{id}', [SppController::class, 'update'])->name('spp.update');

Route::delete('/spp/{id}', [SppController::class, 'destroy'])->name('spp.destroy');
// End Spp

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login.login');
    Route::post('/authenticate', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});

Route::middleware(['can:thisPetugas'])->group(function () {
    Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
});

Route::middleware(['can:thisAdmin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    Route::resource('spp', SppController::class)->parameters([
        'spp' => 'spp'
    ]);

    Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ]);

    Route::resource('petugas', PetugasController::class)->parameters([
        'petugas' => 'petugas'
    ]);
});