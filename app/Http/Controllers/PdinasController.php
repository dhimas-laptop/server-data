<?php

namespace App\Http\Controllers;

use App\Models\spd;
use App\Models\user; 
use App\Models\gambar;    
use App\Models\gambar_spd;
use Illuminate\Http\Request; 


class PdinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $user = user::get();
        $today = today(); 
        
        $spd = spd::where('tgl_spt' , $today)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "tanggal"], compact('user'));
        
    }

    public function index2()
    {
        $user = user::get();
        $today = today(); 
        $bulan = date('m', strtotime($today));
        $tahun = date('Y', strtotime($today));
        $spd = spd::whereMonth('tgl_spt' , $bulan)->whereYear('tgl_spt' , $tahun)->get();
        $tahun1 = spd::select('tgl_spt')->distinct()->get();
        return view('pdinas', ['spd' => $spd , 'active' => "bulan", 'tahun' => $tahun1], compact('user'));
        
    }

    public function index3()
    {
        $user = user::get();
        $today = today(); 
        $tahun = date('Y', strtotime($today));
        $tahun1 = spd::select('tgl_spt')->distinct()->get();
        $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "tahun", 'tahun' => $tahun1], compact('user'));
        
    }

    public function filter1(Request $request)
    {
        $request->validate([
            'filter' => 'required'
        ]);

        $user = user::get();
        
        $spd = spd::where('tgl_spt', $request->filter)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "tanggal",], compact('user'));
        
    }

    public function filter2(Request $request)
    {
        $request->validate([
            'filter1' => 'required',
            'filter2' => 'required'
        ]);

        $user = user::get();
        $bulan = $request->filter1;
        $tahun = date('Y', strtotime($request->filter2));
        $tahun1 = spd::select('tgl_spt')->distinct()->get();
        $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "tahun"], compact('user'));
        
    }

    public function filter3(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);

        $user = user::get();
        $tahun = date('Y', strtotime($request->filter2));
        $tahun1 = spd::select('tgl_spt')->distinct()->get();
        $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "bulan", 'tahun' => $tahun1], compact('user'));
        
    }


    public function proses_tambah(Request $request)
    {
        
        $validate = $request->validate([
            'nomor_spt' => 'required',
            'tgl_spt' => 'required',
            'tujuan' => 'required',
            'berangkat' => 'required',
            'pulang' => 'required',
            'user_id' => 'required'
        ]);    
        $request->validate(['gambar.*' => 'file|max:1024']);
        
        $total = count($validate['user_id']);
        for($i=0; $i<$total; $i++){
            $validate['user_id'] = $request->user_id[$i];
            spd::insert($validate);
            $id_spd[] = spd::max('id');  
        }  

        foreach ($request->file('gambar') as $gambar) {
            $nama_gambar = $gambar->getClientOriginalName();
            $gambar->move(public_path('gambar'), $nama_gambar);                    
            gambar::insert(['gambar' => $nama_gambar]);
            $id_gambar = gambar::max('id');
            foreach ($id_spd as $key) {
            gambar_spd::create([
                'gambar_id' => $id_gambar,
                'spd_id' => $key
                ]);
            }
            }
        
        return back()->with('Sukses', 'Data Berhasil Di input');

    }

    public function update($id)
    {
        $spd = spd::findOrFail($id);
        
        return view('/pdinas/update',['spd' => $spd, 'active' => 'perjalanan-dinas']);

    }
    public function update_proses(Request $request)
    {
        
       spd::where('id', $request->id)
            ->update([
                'nomor_spt' => $request->no_spt,
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => $request->no_spd,
                'tgl_spd' => $request->tgl_spd,
                'tujuan'=> $request->tujuan,
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'uang_harian' => $request->uang_harian,
                'pesawat' => $request->pesawat,
                'no_penerbangan' => $request->no_penerbangan,
                'no_tiket' => $request->no_tiket,
                'kode_booking' => $request->kode_booking,
                'harga_pesawat' => $request->harga_pesawat,
                'taxi' => $request->taxi,
                'hotel' => $request->hotel,
                'harga_hotel' => $request->harga_hotel,
                'no_telp' => $request->no_telp,
                'provinsi' => $request->provinsi,
                'total' => $request->total,
            ]);
            
        return redirect()->back();

    }

    public function hapus($id)
    {
        $gambar_id = [];
        $gambar = gambar_spd::select('gambar_id')->where('spd_id', $id)->get();
        foreach ($gambar as $key) {
            $gambar_id[] = $key->gambar_id; 
        }
        gambar_spd::select('*')->where('spd_id', $id)->delete();
        foreach ($gambar_id as $key) {
            if (gambar_spd::select('*')->where('gambar_id', $key)=== null) {
                foreach ($gambar_id as $key1) {
                    gambar::select('*')->where('id', $key1)->delete();
                }
            }
        }
        
        spd::select('*')->where('id', $id)->delete();
                
        return redirect()->back();
    }

    public function detail($id)
    {
        $spd = spd::findOrFail($id);
        
        return view('pdinas/detail',['spd' => $spd, 'active' => 'perjalanan-dinas']);
    }

    public function download()
    {
        $spd = spd::get();
        return view('/pdinas/unduh',['spd' => $spd, 'active' => 'perjalanan-dinas']);

    }
}
