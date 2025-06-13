<?php

use App\Http\Controllers\BibitController;
use Illuminate\Support\Facades\Route;

//------------------------------------Bibit Start ---------------------------------------------//
Route::get('/data-bibit', [BibitController::class, 'bibit']);
Route::post('/data-bibit/tambah-bibit', [BibitController::class, 'tambah']);
Route::post('/data-bibit/update-bibit', [BibitController::class, 'update']);
Route::get('/data-bibit/hapus/{id}', [BibitController::class, 'hapus']);

Route::get('/data-order', [BibitController::class, 'order']);
Route::get('/data-order/proses/{id}', [BibitController::class, 'proses']);
Route::get('/data-order/selesai/{id}', [BibitController::class, 'selesai']);
Route::get('/data-order/tolak/{id}', [BibitController::class, 'tolak']);
Route::get('/data-order/download/{id}', [BibitController::class, 'download_order']);
Route::get('/data-order/hapus/{id}', [BibitController::class, 'hapus_order']);
Route::get('/map', [BibitController::class, 'map']);
Route::get('/view/{id}', [BibitController::class, 'view']);
//------------------------------------Bibit end---------------------------------------------//


?>