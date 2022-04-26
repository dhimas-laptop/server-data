<?php

namespace App\Http\Controllers;

use App\Models\spd;
use App\Models\user;
use App\Models\bagian;
use Illuminate\Http\Request; 


class PdinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::select('*')->from('users')->get();
        $bagian = bagian::select('*')->from('bagian')->get();
        $spd = spd::select('*')->from('spd')->get();  
        $nomor_spt = spd::select('nomor_spt')->from('spd')->get();
        $nomor_spd= spd::select('nomor_spd')->from('spd')->get();
        $tgl_spt = spd::select('tgl_spt')->from('spd')->get();
        $tgl_spd = spd::select('tgl_spd')->from('spd')->get();
        $tujuan = spd::select('tujuan')->from('spd')->get();
        $berangkat = spd::select('berangkat')->from('spd')->get();
        $pulang = spd::select('pulang')->from('spd')->get();
        
        
        return view('pdinas', [
            'spd' => $spd, 
            'nomor_spt' => $nomor_spt,
            'nomor_spd' => $nomor_spd,
            'tgl_spt' => $tgl_spt,
            'tgl_spd' => $tgl_spd,
            'tujuan' => $tujuan,
            'berangkat' => $berangkat,
            'pulang' => $pulang,
        ], compact('user', 'bagian'));
        
    }

    public function proses_tambah(Request $request)
    {
        $nomor_spt = $request->nomor_spt;
        $tgl_spt = $request->tgl_spt;
        $tujuan = $request->tujuan;
        $berangkat = $request->berangkat;
        $pulang = $request->pulang;
        $bagian = $request->bagian_id;
        $user_id = $request->user_id;
        $total = count($user_id);
        
        for($i=0; $i<$total; $i++){
            $take = spd::orderBy('id','asc')->get('id');
            foreach($take as $key){
                $id = $key->id;
            }
            spd::insert([
                'id' => $id+1,
                'nomor_spt' => $nomor_spt,
                'tgl_spt' => $tgl_spt,
                'tujuan' => $tujuan,
                'berangkat' => $berangkat,
                'pulang' => $pulang,
                'bagian_id' => $bagian,
                'user_id' => $user_id[$i]
            ]);
        }
        
        return redirect()->action([PdinasController::class, 'index']);
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
            
        return redirect()->action([PdinasController::class, 'index']);

    }
    
    public function detail()
    {
        $spd = spd::get();
        
        return view('/pdinas/detail',['spd' => $spd]);

    }

    public function hapus($id)
    {
        spd::select('*')->where('id', $id)->delete();
                
        return redirect()->action([PdinasController::class, 'index']);
    }

}
