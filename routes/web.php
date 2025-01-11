<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/gempa', function () {
    return view('gempa');
});
// untuk menghubungkan ke controller provinsi
use App\Http\Controllers\ProvinsiController;
Route::get('/provinsi', [ProvinsiController::class, 'getProvinsiData']);

// untuk menghubungkan ke controller kab kota
use App\Http\Controllers\KabkotaController;
Route::get('/kabkota', [KabkotaController::class, 'getKabkotaData']);
//Route::get('/kabkota', [KabkotaController::class, 'getKabkotaData'])->name('kabkota.index');

// tabel, jika eror hapus ini saja
Route::get('/provinsi-tabel', [ProvinsiController::class, 'showTable']); // Menampilkan tabel

