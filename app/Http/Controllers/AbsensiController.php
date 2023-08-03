<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\gambar;
use App\Models\gambarpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
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
            $gambar->move(public_path('gambarp'), $nama_gambar);

            gambarpl::insert([
                'gambar' => $nama_gambar,
                'absensi_id' =>$id
            ]);
            }

            return redirect('/absensi-PL')->with('success', 'Data Berhasil Di tambahkan');

    }

    public function absensipl()
    {
        $absensi = absensi::get();
        return view('absensi/absencontroller', ['absensi' => $absensi,'active' => "absensipl", 'no' => 1]);
    }
}
