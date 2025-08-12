<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//------------------------------------Pengguna---------------------------------------------//
Route::get('/Pengguna', [UserController::class, 'index'])->middleware('auth');
Route::post('/Pengguna/tambah', [UserController::class, 'tambah'])->middleware('auth');
Route::get('/Pengguna/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::post('/Pengguna/update-proses', [UserController::class, 'update_proses'])->middleware('auth');
Route::get('/Pengguna/hapus/{id}', [UserController::class, 'hapus'])->middleware('admin');
//------------------------------------Pengguna end---------------------------------------------//


?>