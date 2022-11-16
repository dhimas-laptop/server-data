<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdinasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Tata_airController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\TelemetriController;
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

Route::get('/profil', function() {return view('guest/tentang');});
Route::get('/visi-misi', function() {return view('guest/visimisi');});
Route::get('/tugas-pokok-dan-fungsi', function() {return view('guest/tugaspokok');});
Route::get('/struktur-organisasi', function() {return view('guest/struktur');});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'register_proses']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('home');

//------------------------------------perjalanan dinas---------------------------------------------//
Route::get('/perjalanan-dinas/tanggal', [PdinasController::class, 'index1'])->middleware('auth')->name('tanggal');
Route::post('/perjalanan-dinas/tanggal', [PdinasController::class, 'filter1'])->middleware('auth')->name('filter_tanggal');
Route::get('/perjalanan-dinas/bulan', [PdinasController::class, 'index2'])->middleware('auth')->name('bulan');
Route::post('/perjalanan-dinas/bulan', [PdinasController::class, 'filter2'])->middleware('auth')->name('filter_bulan');
Route::get('/perjalanan-dinas/tahun', [PdinasController::class, 'index3'])->middleware('auth')->name('tahun');
Route::post('/perjalanan-dinas/tahun', [PdinasController::class, 'index3'])->middleware('auth')->name('filter_tahun');

Route::get('/perjalanan-dinas/download', [PdinasController::class, 'download'])->middleware('auth')->name('download');
Route::get('/perjalanan-dinas/download/bukti/{id}', [PdinasController::class, 'downloadget'])->middleware('auth');
Route::post('/perjalanan-dinas/downloadfilter', [PdinasController::class, 'downloadfilter'])->middleware('auth')->name('download_filter');
Route::post('/perjalanan-dinas/proses-tambah', [PdinasController::class, 'proses_tambah'])->middleware('auth');
Route::get('/perjalanan-dinas/update/{id}', [PdinasController::class, 'update'])->middleware('auth');
Route::post('/perjalanan-dinas/update/{id}', [PdinasController::class, 'tambah_gambar'])->middleware('auth');
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
//------------------------------------Bibit end---------------------------------------------//


//------------------------------------API Start ---------------------------------------------//
Route::get('/api/list', [TelemetriController::class, 'home']);
Route::get('/api/tanjung-pinang', [TelemetriController::class, 'tanjungpinang']);
Route::get('/api/batam', [TelemetriController::class, 'batam']);
//------------------------------------API end---------------------------------------------//

//------------------------------------matriks Start ---------------------------------------------//
Route::get('/matriks', [MatriksController::class, 'index'])->middleware('admin');
//------------------------------------matriks end---------------------------------------------//

Route::get('/test', [BibitController::class, 'test']);