<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdinasController;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
});

Route::get('/perjalanan-dinas', [PdinasController::class, 'index'])->name('index');
Route::post('/perjalanan-dinas/proses-tambah', [PdinasController::class, 'proses_tambah'])->name('proses_tambah');
Route::get('/perjalanan-dinas/update/{id}', [PdinasController::class, 'update'])->name('update');
Route::post('/perjalanan-dinas/update-proses', [PdinasController::class, 'update_proses'])->name('update-proses');

Route::get('/perjalanan-dinas/hapus/{id}', [PdinasController::class, 'hapus'])->name('hapus');
Route::get('/perjalanan-dinas/detail', [PdinasController::class, 'detail'])->name('detail');

Route::get('/Pengguna', [UserController::class, 'index'])->name('index');
Route::post('/Pengguna/tambah', [UserController::class, 'tambah'])->name('tambah');

