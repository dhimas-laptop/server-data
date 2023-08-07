<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\gambar;
use App\Models\gambarlaporan;
use App\Models\gambarpl;
use App\Models\laporan;
use Illuminate\Http\Request;
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
            $gambar->move(public_path('../../public_html/gambarpl'), $nama_gambar);

            gambarpl::insert([
                'gambar' => $nama_gambar,
                'absensi_id' =>$id
            ]);
            }

            return redirect('/absensi-PL')->with('success', 'Data Berhasil Di tambahkan');

    }

    public function absensicontroller()
    {
        $absensi = absensi::get();
        return view('absensi/absencontroller', ['absensi' => $absensi,'active' => "absensipl", 'no' => 1]);
    }

    public function laporanpl()
    {
        return view('absensi/laporanpl');
    }

    public function laporanproses(Request $request)
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
            $gambar->move(public_path('../../public_html/gambarpl'), $nama_gambar);

            gambarlaporan::insert([
                'gambar' => $nama_gambar,
                'laporan_id' =>$id
            ]);
            }

            return redirect('/laporan-bulanan')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function test()
    {
        $test = public_path('../../public_html/gambarpl');
        return view($test);
    }
}
