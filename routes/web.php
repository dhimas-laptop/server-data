<?php

use Illuminate\Support\Facades\Route;
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
        // $xml_file = new SimpleXMLElement('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-KepulauanRiau.xml',0,true);
        // $json = json_encode($xml_file);
        // $array = json_decode($json,TRUE);
        // $batam = $array['forecast']['area'][0]['parameter'][6]['timerange'];
        // $bintan = $array['forecast']['area'][1]['parameter'][6]['timerange'];
        // $daik = $array['forecast']['area'][2]['parameter'][6]['timerange'];
        // $ranai = $array['forecast']['area'][3]['parameter'][6]['timerange'];
        // $karimun = $array['forecast']['area'][4]['parameter'][6]['timerange'];
        // $tp = $array['forecast']['area'][5]['parameter'][6]['timerange'];
        // $anambas = $array['forecast']['area'][6]['parameter'][6]['timerange'];
        // $data = $array['forecast']['issue']['timestamp'];
    return view('welcome');
});

Route::get('/profil', function() {return view('guest/tentang');});
Route::get('/visi-misi', function() {return view('guest/visimisi');});
Route::get('/tugas-pokok-dan-fungsi', function() {return view('guest/tugaspokok');});
Route::get('/struktur-organisasi', function() {return view('guest/struktur');});
Route::get('/sk-kkmd', function() {return view('guest/skkkmd');});
Route::get('/renaksi-kkmd', function() {return view('guest/renaksikkmd');});
Route::get('/sk-pmn', function() {return view('guest/skpmn');});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'register_proses']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('home');

// link ke rute berbeda
include __DIR__.'/app/pengguna.php';
include __DIR__.'/app/perjalananDinas.php';
include __DIR__.'/app/absensiPL.php';
include __DIR__.'/app/spjOnline.php';
include __DIR__.'/app/bibit.php';



Route::get('/reset', [UserController::class, 'reset'])->middleware('admin');
Route::get('/test', [BibitController::class, 'test'])->middleware('admin');

//------------------------------------Tata Air---------------------------------------------//
Route::get('/curah-hujan', [Tata_airController::class, 'curah_hujan'])->name('curah_hujan');
Route::post('/curah-hujan/filter-curah-hujan', [Tata_airController::class, 'filter_ch'])->name('filterch');
Route::get('/tinggi-muka-air', [Tata_airController::class, 'tma'])->name('tma');
Route::get('/debit-air', [Tata_airController::class, 'debit_air'])->name('debit_air');
Route::get('/grafik', [Tata_airController::class, 'grafik'])->name('grafik');
//------------------------------------Tata Air end---------------------------------------------//



//------------------------------------API Start ---------------------------------------------//
Route::get('/api/list', [TelemetriController::class, 'home']);
Route::get('/api/tanjung-pinang', [TelemetriController::class, 'tanjungpinang']);
Route::get('/api/batam', [TelemetriController::class, 'batam']);
//------------------------------------API end---------------------------------------------//



//------------------------------------matriks Start ---------------------------------------------//
Route::get('/matriks', [MatriksController::class, 'index'])->middleware('admin');
//------------------------------------matriks end---------------------------------------------//