<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\gambar;
use App\Models\gambarlaporan;
use App\Models\gambarmingguan;
use App\Models\gambarpl;
use App\Models\laporan;
use App\Models\mingguan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi/index');
    }
    public function absensipl()
    {
        return view('absensi/absen');
    }

    public function proses(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'lokasi' => 'required',
            'informasi' => 'nullable',
            'tanggal' => 'required',
        ]);

        $request->validate([
            'gambar' => 'required',
        ]);
            absensi::insertGetId($validate);
            
            $id = absensi::max('id');

            foreach ($request->file('gambar') as $gambar) {
            $nama_gambar = time() . '-' . $gambar->getClientOriginalName();
            $gambar->move(public_path('gambarpl'), $nama_gambar);

            gambarpl::insert([
                'gambar' => $nama_gambar,
                'absensi_id' =>$id
            ]);
            }

            return redirect('/absensi-PL')->with('success', 'Data Berhasil Di tambahkan');

    }

    public function absensicontrol()
    {
        if (Auth::check()) {
        $absensi = absensi::orderBy('id', 'DESC')->get();
        return view('absensi/controller/absencontrol', ['absensi' => $absensi,'active' => "absensiPL", 'no' => 1]);
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function bulananpl()
    {
        return view('absensi/laporanpl');
    }

    public function bulananproses(Request $request)
    {
        $validate = $request->validate([
        'nama'=> 'required',
        'lokasi'=> 'required',
        'koordinat'=> 'required',
        'luas'=> 'required',
        'das'=> 'required',
        'kelurahan'=> 'required',
        'kecamatan'=> 'required',
        'kota'=> 'required',
        'total'=> 'required',
        'jenis'=> 'required',
        'lokasi'=> 'required',
        'kondisi' => 'required',
        'question1'=> 'required',
        'question2'=> 'required',
        'question3'=> 'required',
        'question4'=> 'required',
        'question5'=> 'required',
        'question6'=> 'required',
        'question7'=> 'required',
        'question8'=> 'required',
        'question9'=> 'required',
        'question10'=> 'required',
        'question11'=> 'required',
        'pupuk1'=> 'required',
        'pupuk2'=> 'required',
        'pupuk3'=> 'required',
        'hidrogel1'=> 'required',
        'hidrogel2'=> 'required',
        'hidrogel3'=> 'required',
        'sulam1'=> 'required',
        'sulam2'=> 'required',
        'sulam3'=> 'required',
        'dolomit1'=> 'required',
        'dolomit2'=> 'required',
        'dolomit3'=> 'required',
        'penyiangan1'=> 'required',
        'penyiangan2'=> 'required',
        'penyiangan3'=> 'required',
        'pendangiran1'=> 'required',
        'pendangiran2'=> 'required',
        'pendangiran3'=> 'required',
        'pemupukan1'=> 'required',
        'pemupukan2'=> 'required',
        'pemupukan3'=> 'required',
        'penyulaman1'=> 'required',
        'penyulaman2'=> 'required',
        'penyulaman3'=> 'required',
        'pemberantasan1'=> 'required',
        'pemberantasan2'=> 'required',
        'pemberantasan3'=> 'required',
        'problem1'=> 'required',
        'problem2'=> 'required',
        'problem3'=> 'required',
        'problem4'=> 'required',
        ]);

        $request->validate([
            'gambar' => 'required',
        ]);
            laporan::insertGetId($validate);
            
            $id = laporan::max('id');

            foreach ($request->file('gambar') as $gambar) {
            $nama_gambar = time() . '-' . $gambar->getClientOriginalName();
            $gambar->move(public_path('gambarpl'), $nama_gambar);

            gambarlaporan::insert([
                'gambar' => $nama_gambar,
                'laporan_id' =>$id
            ]);
            }
            
            return redirect('/laporan-bulanan')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function bulanancontrol()
    {
        if (Auth::check()) {
        $bulanan = laporan::orderBy('id', 'DESC')->get();
        return view('absensi/controller/bulanancontrol', ['bulanan' => $bulanan,'active' => "bulananPL", 'no' => 1]);
        }else {
            redirect('/login');
        }
    }

    function bulanandetail($id) {
        if (Auth::check()) {
            $data = laporan::findOrFail($id);
            return view('absensi/detail/bulanan', ['data' => $data, 'active' => 'bulananPL']);
        }else {
            redirect('/login');
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function mingguanpl()
    {
        return view('absensi/mingguanpl');
    }

    public function mingguanproses(Request $request)
    {
        $validate = $request->validate([
        'nama'=> 'required',
        'lokasi'=> 'required',
        'kondisi' => 'required',
        'koordinat'=> 'required',
        'luas'=> 'required',
        'das'=> 'required',
        'kelurahan'=> 'required',
        'kecamatan'=> 'required',
        'kota'=> 'required',
        'total'=> 'required',
        'jenis'=> 'required',
        'lokasi'=> 'required',
        'question1'=> 'required',
        'question2'=> 'required',
        'question3'=> 'required',
        'question4'=> 'required',
        'question5'=> 'required',
        'question6'=> 'required',
        'question7'=> 'required',
        'question8'=> 'required',
        'question9'=> 'required',
        'question10'=> 'required',
        'question11'=> 'required',
        'question12' => 'required',
        'kemajuan1' => 'required',
        'kemajuan2' => 'required',
        'kemajuan3' => 'required',
        'kemajuan4' => 'required',
        'kemajuan5' => 'required',
        'kemajuan6' => 'required',
        'kemajuan7' => 'required',
        'kemajuan8' => 'required',
        'kemajuan9' => 'required',
        'kemajuan10' => 'required',
        'pupuk1' => 'required',
        'pupuk2' => 'required',
        'pupuk3' => 'required',
        'pupuk4' => 'required',
        'pupuk5' => 'required',
        'pupuk6' => 'required',
        'pupuk7' => 'required',
        'pupuk8' => 'required',
        'pupuk9' => 'required',
        'pupuk10' => 'required',
        'npk1' => 'required',
        'npk2' => 'required',
        'npk3' => 'required',
        'npk4' => 'required',
        'npk5' => 'required',
        'npk6' => 'required',
        'npk7' => 'required',
        'npk8' => 'required',
        'npk9' => 'required',
        'npk10' => 'required',
        'hidrogel1' => 'required',
        'hidrogel2' => 'required',
        'hidrogel3' => 'required',
        'hidrogel4' => 'required',
        'hidrogel5' => 'required',
        'hidrogel6' => 'required',
        'hidrogel7' => 'required',
        'hidrogel8' => 'required',
        'hidrogel9' => 'required',
        'hidrogel10' => 'required',
        'sulam1' => 'required',
        'sulam2' => 'required',
        'sulam3' => 'required',
        'sulam4' => 'required',
        'sulam5' => 'required',
        'sulam6' => 'required',
        'sulam7' => 'required',
        'sulam8' => 'required',
        'sulam9' => 'required',
        'sulam10' => 'required',
        'problem1'=> 'required',
        'problem2'=> 'required',
        'problem3'=> 'required',
        ]);

        $request->validate([
            'gambar' => 'required',
        ]);
            mingguan::insertGetId($validate);
            
            $id = mingguan::max('id');

            foreach ($request->file('gambar') as $gambar) {
            $nama_gambar = time() . '-' . $gambar->getClientOriginalName();
            $gambar->move(public_path('gambarpl'), $nama_gambar);

            gambarmingguan::insert([
                'gambar' => $nama_gambar,
                'mingguan_id' =>$id
            ]);
            }

            return redirect('/laporan-mingguan')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function mingguancontrol()
    {
        if (Auth::check()) {
        $mingguan = mingguan::orderBy('id', 'DESC')->get();
        return view('absensi/controller/mingguancontrol', ['mingguan' => $mingguan,'active' => "mingguanPL", 'no' => 1]);
        }else {
            redirect('/login');
        }
    }

    function mingguandetail($id) 
    {
        if (Auth::check()) {
            $data = mingguan::findOrFail($id);
            return view('absensi/detail/mingguan', ['data' => $data, 'active' => 'mingguanPL']);
        }else {
            redirect('/login');
        }
    }
    
    
    // ------------------------------------- DOWNLOAD Controller-------------------------------------
    public function absensidownload()
    {
        $data = absensi::get();
    }


}
