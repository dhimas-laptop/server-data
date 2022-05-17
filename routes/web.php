<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdinasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Tata_airController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'register_proses']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/perjalanan-dinas/unduh', [PdinasController::class, 'unduh'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('home');

//------------------------------------perjalanan dinas---------------------------------------------//
Route::get('/perjalanan-dinas/tanggal', [PdinasController::class, 'index1'])->middleware('auth')->name('tanggal');
Route::post('/perjalanan-dinas/tanggal', [PdinasController::class, 'filter1'])->middleware('auth')->name('filter_tanggal');
Route::get('/perjalanan-dinas/bulan', [PdinasController::class, 'index2'])->middleware('auth')->name('bulan');
Route::post('/perjalanan-dinas/bulan', [PdinasController::class, 'filter2'])->middleware('auth')->name('filter_bulan');
Route::get('/perjalanan-dinas/tahun', [PdinasController::class, 'index3'])->middleware('auth')->name('tahun');
Route::post('/perjalanan-dinas/tahun', [PdinasController::class, 'index3'])->middleware('auth')->name('filter_tahun');

Route::get('/perjalanan-dinas/download', [PdinasController::class, 'download'])->middleware('auth')->name('download');
Route::post('/perjalanan-dinas/download', [PdinasController::class, 'download_filter'])->middleware('auth')->name('download_filter');
Route::post('/perjalanan-dinas/proses-tambah', [PdinasController::class, 'proses_tambah'])->middleware('auth');
Route::get('/perjalanan-dinas/update/{id}', [PdinasController::class, 'update'])->middleware('auth');
Route::post('/perjalanan-dinas/update-proses', [PdinasController::class, 'update_proses'])->middleware('auth');
Route::get('/perjalanan-dinas/{id}', [PdinasController::class, 'detail'])->middleware('auth');
Route::get('/perjalanan-dinas/hapus/{id}', [PdinasController::class, 'hapus'])->middleware('auth');
//------------------------------------perjalanan dinas end---------------------------------------------//

//------------------------------------Pengguna---------------------------------------------//
Route::get('/Pengguna', [UserController::class, 'index'])->middleware('admin');
Route::post('/Pengguna/tambah', [UserController::class, 'tambah'])->middleware('admin');
Route::get('/Pengguna/update/{id}', [UserController::class, 'update'])->middleware('admin');
Route::post('/Pengguna/update-proses', [UserController::class, 'update_proses'])->middleware('admin');
Route::get('/Pengguna/hapus/{id}', [UserController::class, 'hapus'])->middleware('admin');
//------------------------------------Pengguna end---------------------------------------------//

//------------------------------------Tata Air---------------------------------------------//
Route::get('/curah-hujan', [Tata_airController::class, 'curah_hujan'])->name('curah_hujan');
Route::get('/tinggi-muka-air', [Tata_airController::class, 'tma'])->name('tma');
Route::get('/debit-air', [Tata_airController::class, 'debit_air'])->name('debit_air');
Route::get('/grafik', [Tata_airController::class, 'grafik'])->name('grafik');


//------------------------------------Tata Air end---------------------------------------------//