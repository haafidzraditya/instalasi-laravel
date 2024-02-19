<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;

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

Route::resource('kelas', KelasController::class)->parameters([
    'kelas' => 'kelas'
]);

Route::resource('petugas', PetugasController::class)->parameters([
    'petugas' => 'petugas'
]);