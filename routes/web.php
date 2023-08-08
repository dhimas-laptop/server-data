<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdinasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Tata_airController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\SpjController;
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
        $xml_file = new SimpleXMLElement('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-KepulauanRiau.xml',0,true);
        $json = json_encode($xml_file);
        $array = json_decode($json,TRUE);
        $batam = $array['forecast']['area'][0]['parameter'][6]['timerange'];
        $bintan = $array['forecast']['area'][1]['parameter'][6]['timerange'];
        $daik = $array['forecast']['area'][2]['parameter'][6]['timerange'];
        $ranai = $array['forecast']['area'][3]['parameter'][6]['timerange'];
        $karimun = $array['forecast']['area'][4]['parameter'][6]['timerange'];
        $tp = $array['forecast']['area'][5]['parameter'][6]['timerange'];
        $anambas = $array['forecast']['area'][6]['parameter'][6]['timerange'];
        $data = $array['forecast']['issue']['timestamp'];
    return view('welcome', ['batam' => $batam , 'bintan' => $bintan, 'daik' => $daik, 'ranai' => $ranai, 'karimun' => $karimun, 'tp' => $tp, 'anambas' => $anambas, 'data' => $data ]);
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

//------------------------------------Pengguna---------------------------------------------//
Route::get('/Pengguna', [UserController::class, 'index'])->middleware('auth');
Route::post('/Pengguna/tambah', [UserController::class, 'tambah'])->middleware('auth');
Route::get('/Pengguna/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::post('/Pengguna/update-proses', [UserController::class, 'update_proses'])->middleware('auth');
Route::get('/Pengguna/hapus/{id}', [UserController::class, 'hapus'])->middleware('admin');
//------------------------------------Pengguna end---------------------------------------------//

//------------------------------------Tata Air---------------------------------------------//
Route::get('/curah-hujan', [Tata_airController::class, 'curah_hujan'])->name('curah_hujan');
Route::post('/curah-hujan/filter-curah-hujan', [Tata_airController::class, 'filter_ch'])->name('filterch');
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
Route::get('/map', [BibitController::class, 'map']);
//------------------------------------Bibit end---------------------------------------------//

//------------------------------------API Start ---------------------------------------------//
Route::get('/api/list', [TelemetriController::class, 'home']);
Route::get('/api/tanjung-pinang', [TelemetriController::class, 'tanjungpinang']);
Route::get('/api/batam', [TelemetriController::class, 'batam']);
//------------------------------------API end---------------------------------------------//

//------------------------------------PL pengawas Start ---------------------------------------------//
Route::get('/PL', [AbsensiController::class, 'index']);
Route::get('/absensi-PL', [AbsensiController::class, 'absensipl']); //Guest Form
Route::post('/absenproses', [AbsensiController::class, 'proses'])->middleware('auth'); //Form Process
Route::get('/absensiPL', [AbsensiController::class, 'absensicontrol'])->middleware('auth'); //SIPUDA Controller
// Route::get('/laporan-bulanan', [AbsensiController::class, 'laporanpl']); //Guest Form
// Route::post('/laporanproses', [AbsensiController::class, 'laporanproses']); //Form Process
// Route::get('/bulananPL', [AbsensiController::class, 'absensicontroller']); //SIPUDA Controller
Route::get('/laporan-bulanan', [AbsensiController::class, 'bulananpl']); //Guest Form
Route::post('/laporanproses', [AbsensiController::class, 'bulananproses'])->middleware('auth'); //Form Process
Route::get('/bulananPL', [AbsensiController::class, 'bulanancontrol'])->middleware('auth'); //SIPUDA Control
//------------------------------------PL pengawas end---------------------------------------------//

//------------------------------------matriks Start ---------------------------------------------//
Route::get('/matriks', [MatriksController::class, 'index'])->middleware('admin');
//------------------------------------matriks end---------------------------------------------//

//------------------------------------SPJ Start ---------------------------------------------//
Route::get('/DRPP', [SpjController::class, 'drpp_index'])->middleware('admin');
//------------------------------------SPJ end---------------------------------------------//
Route::get('/reset', [UserController::class, 'reset'])->middleware('admin');
Route::get('/test', [AbsensiController::class, 'test'])->middleware('admin');