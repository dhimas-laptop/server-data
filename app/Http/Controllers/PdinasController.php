<?php

namespace App\Http\Controllers;

use App\Models\spd;
use App\Models\user;    
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
        
        return view('pdinas', ['spd' => $spd , 'active' => "tanggal" ], compact('user'));
        
    }

    public function index2()
    {
        $user = user::get();
        $today = today(); 
        $bulan = date('m', strtotime($today));
        $tahun = date('Y', strtotime($today));
        $spd = spd::whereMonth('tgl_spt' , $bulan)->whereYear('tgl_spt' , $tahun)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "bulan"], compact('user'));
        
    }

    public function index3()
    {
        $user = user::get();
        $today = today(); 
        $tahun = date('Y', strtotime($today));
        
        $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        
        return view('pdinas', ['spd' => $spd , 'active' => "tahun"], compact('user'));
        
    }

    public function proses_tambah(Request $request)
    {
        $validate = $request->validate([
            'nomor_spt' => 'required',
            'tgl_spt' => 'required',
            'tujuan' => 'required',
            'berangkat' => 'required',
            'pulang' => 'required',
            'user_id' => 'required',
        ]);     
        $validate2 = $request->validate([
            'gambar' => 'file|max:1024'   
        ]);   
        $total = count($validate['user_id']);
        $gambars = [];
        foreach ($request->file('gambar') as $gambar) {
            if ($gambar->isvalid()) {
                $nama_gambar = $gambar->getClientOriginalName();
                $gambar->move(public_path($validate['nomor_spt']), $nama_gambar);                    
                    $files[] = [
                        'filename' => $nama_gambar,
                    ];
            }
        }
        for($i=0; $i<$total; $i++){
            $validate['user_id'] = $request->user_id[$i];
            spd::insert($validate);
        }
        
        return redirect()->back();
    }

    public function update($id)
    {
        $spd = spd::findOrFail($id);
        
        return view('/pdinas/update',['spd' => $spd]);

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
    
    public function download()
    {
        $spd = spd::get();
        
        return view('/pdinas/detail',['spd' => $spd, 'active' => 'perjalanan-dinas']);

    }

    public function hapus($id)
    {
        spd::select('*')->where('id', $id)->delete();
                
        return redirect()->back();
    }

}
