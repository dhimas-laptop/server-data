<?php

use App\Http\Controllers\PdinasController;
use Illuminate\Support\Facades\Route;

//------------------------------------perjalanan dinas---------------------------------------------//
Route::get('/perjalanan-dinas/524113', [PdinasController::class, 'index3'])->middleware('auth')->name('524113');
Route::post('/perjalanan-dinas/filter-524113', [PdinasController::class, 'filter3'])->middleware('auth');
Route::get('/perjalanan-dinas/524119', [PdinasController::class, 'index2'])->middleware('auth')->name('524119');
Route::post('/perjalanan-dinas/filter-524119', [PdinasController::class, 'filter2'])->middleware('auth');
Route::get('/perjalanan-dinas/524114', [PdinasController::class, 'index1'])->middleware('auth')->name('524114');
Route::post('/perjalanan-dinas/filter-524114', [PdinasController::class, 'filter1'])->middleware('auth');
Route::post('/perjalanan-dinas/tahun', [PdinasController::class, 'filter'])->middleware('auth');
Route::get('/perjalanan-dinas/524111', [PdinasController::class, 'index'])->middleware('auth')->name('tahun');

Route::get('/perjalanan-dinas/download', [PdinasController::class, 'download'])->middleware('auth')->name('download');
Route::get('/perjalanan-dinas/download/bukti/{id}', [PdinasController::class, 'downloadget'])->middleware('auth');
Route::post('/perjalanan-dinas/downloadfilter', [PdinasController::class, 'downloadfilter'])->middleware('auth')->name('download_filter');
Route::get('/perjalanan-dinas/download-524114', [PdinasController::class, 'download_524114'])->middleware('auth')->name('download_524114');
Route::post('/perjalanan-dinas/downloadfilter524114', [PdinasController::class, 'downloadfilter524114'])->middleware('auth')->name('downloadfilter524114');
Route::get('/perjalanan-dinas/download-524119', [PdinasController::class, 'download_524119'])->middleware('auth')->name('download_524119');
Route::post('/perjalanan-dinas/downloadfilter524119', [PdinasController::class, 'downloadfilter524119'])->middleware('auth')->name('downloadfilter524119');
Route::get('/perjalanan-dinas/download-524113', [PdinasController::class, 'download_524113'])->middleware('auth')->name('download_524113');
Route::post('/perjalanan-dinas/downloadfilter524113', [PdinasController::class, 'downloadfilter524113'])->middleware('auth')->name('downloadfilter524113');

Route::post('/perjalanan-dinas/proses-tambah', [PdinasController::class, 'proses_tambah'])->middleware('auth');
Route::post('/perjalanan-dinas/tambah-524114', [PdinasController::class, 'tambah_524114'])->middleware('auth');
Route::post('/perjalanan-dinas/tambah-524119', [PdinasController::class, 'tambah_524119'])->middleware('auth');
Route::post('/perjalanan-dinas/tambah-524113', [PdinasController::class, 'tambah_524113'])->middleware('auth');

Route::get('/perjalanan-dinas/update/{id}', [PdinasController::class, 'update'])->middleware('auth');
Route::post('/perjalanan-dinas/update/{id}', [PdinasController::class, 'tambah_gambar'])->middleware('auth');
Route::post('/perjalanan-dinas/update-proses', [PdinasController::class, 'update_proses'])->middleware('auth');
Route::get('/perjalanan-dinas/update-524114/{id}', [PdinasController::class, 'update1'])->middleware('auth');
Route::post('/perjalanan-dinas/update-proses/524114', [PdinasController::class, 'update_proses1'])->middleware('auth');
Route::get('/perjalanan-dinas/update-524119/{id}', [PdinasController::class, 'update2'])->middleware('auth');
Route::post('/perjalanan-dinas/update-proses/524119', [PdinasController::class, 'update_proses2'])->middleware('auth');
Route::get('/perjalanan-dinas/update-524113/{id}', [PdinasController::class, 'update3'])->middleware('auth');
Route::post('/perjalanan-dinas/update-proses/524113', [PdinasController::class, 'update_proses3'])->middleware('auth');

Route::get('/perjalanan-dinas/{id}', [PdinasController::class, 'detail'])->middleware('auth');
Route::get('/perjalanan-dinas/524114/{id}', [PdinasController::class, 'detail1'])->middleware('auth');
Route::get('/perjalanan-dinas/524119/{id}', [PdinasController::class, 'detail2'])->middleware('auth');
Route::get('/perjalanan-dinas/524113/{id}', [PdinasController::class, 'detail3'])->middleware('auth');

Route::get('/perjalanan-dinas/hapus/{id}', [PdinasController::class, 'hapus'])->middleware('auth');
Route::get('/perjalanan-dinas/hapus-524114/{id}', [PdinasController::class, 'hapus1'])->middleware('auth');
Route::get('/perjalanan-dinas/hapus-524119/{id}', [PdinasController::class, 'hapus2'])->middleware('auth');
Route::get('/perjalanan-dinas/hapus-524113/{id}', [PdinasController::class, 'hapus3'])->middleware('auth');

Route::get('/export',[PdinasController::class, 'export']);
Route::post('/export',[PdinasController::class, 'exportpost']);
//------------------------------------perjalanan dinas end---------------------------------------------//


?>