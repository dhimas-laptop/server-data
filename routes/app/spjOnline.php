<?php

use App\Http\Controllers\spjOnline\DataSatkerController;
use App\Http\Controllers\spjOnline\TTDController;
use Illuminate\Support\Facades\Route;

// rute untuk modul penandatangan
Route::get('/spj-online/penandatangan', [TTDController::class, 'penandatangan']);
Route::get('/spj-online/dataTTD', [TTDController::class, 'indexPenandatangan']);
Route::post('/spj-online/tambahTTD', [TTDController::class, 'tambahPenandatangan']);
Route::post('/spj-online/hapusTTD', [TTDController::class, 'hapusPenandatangan']);

// rute untuk modul dataSatker
Route::get('/spj-online/dataSatker', [DataSatkerController::class, 'index']);
Route::get('/spj-online/data-dataSatker', [DataSatkerController::class, 'showData']);
Route::post('/spj-online/tambahSatker', [DataSatkerController::class, 'addData']);
Route::post('/spj-online/hapusSatker', [DataSatkerController::class, 'deleteData']);

// RUTE UNTUK MODUL 

?>