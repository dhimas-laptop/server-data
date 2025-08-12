<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;

//------------------------------------PL pengawas Start ---------------------------------------------//
Route::get('/PL', [AbsensiController::class, 'index']);
Route::get('/absensi-PL', [AbsensiController::class, 'absensipl']); //Guest Form
Route::post('/absenproses', [AbsensiController::class, 'proses']); //Form Process
Route::get('/absensiPL', [AbsensiController::class, 'absensicontrol'])->middleware('auth'); //SIPUDA Controller
Route::get('/absensiPL/download', [AbsensiController::class, 'absensidownload'])->middleware('auth'); //Form
Route::get('/absensiPL/detail/{id}', [AbsensiController::class, 'absensidetail'])->middleware('auth'); //Form Process

Route::get('/laporan-bulanan', [AbsensiController::class, 'bulananpl']); //Guest Form
Route::post('/laporanproses', [AbsensiController::class, 'bulananproses']); //Form Process
Route::get('/bulananPL', [AbsensiController::class, 'bulanancontrol'])->middleware('auth'); //SIPUDA Control
Route::post('/bulananPL/download', [AbsensiController::class, 'bulanandownload'])->middleware('auth'); //Form Process
Route::get('/bulananPL/detail/{id}', [AbsensiController::class, 'bulanandetail'])->middleware('auth'); //Form Process

Route::get('/laporan-mingguan', [AbsensiController::class, 'mingguanpl']); //Guest Form
Route::post('/laporan-proses-mingguan', [AbsensiController::class, 'mingguanproses']); //Form Process
Route::get('/mingguanPL', [AbsensiController::class, 'mingguancontrol'])->middleware('auth'); //SIPUDA Control
Route::post('/mingguanPL/download', [AbsensiController::class, 'mingguandownload'])->middleware('auth'); //Form Process
Route::get('/mingguanPL/detail/{id}', [AbsensiController::class, 'mingguandetail'])->middleware('auth'); //Form Process
//------------------------------------PL pengawas end---------------------------------------------//


?>