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

    public function unduh(Request $request)
    {
        
        $cnomor_spt = $request->no_spt;
        $ctgl_spt = $request->tgl_spt;
        $cnomor_spd = $request->no_spd;
        $ctgl_spd = $request->tgl_spd;
        $ctujuan = $request->tujuan;
        $cberangkat = $request->berangkat;
        $cpulang = $request->pulang;
        $cbagian = $request->bagian;
        $cuser_id = $request->user_id;
        
       
        if (collect($cnomor_spt)->isEmpty()) {
            $nomor_spt = 0;
        } else {
            $nomor_spt = count($cnomor_spt);
        }
        if (collect($ctgl_spt)->isEmpty()) {
            $tgl_spt = 0;
        } else {
            $tgl_spt = count($ctgl_spt);
        }
        if (collect($cnomor_spd)->isEmpty()) {
            $nomor_spd = 0;
        } else {
            $nomor_spd = count($cnomor_spd);
        }
        if (collect($ctgl_spd)->isEmpty()) {
            $tgl_spd = 0;
        } else {
            $tgl_spd = count($ctgl_spd);
        }
        if (collect($ctujuan)->isEmpty()) {
            $tujuan = 0;
        } else {
            $tujuan = count($ctujuan);
        }
        if (collect($cberangkat)->isEmpty()) {
            $berangkat = 0;
        } else {
            $berangkat = count($cberangkat);
        }
        if (collect($cpulang)->isEmpty()) {
            $pulang = 0;
        } else {
            $pulang = count($cpulang);
        }
        if (collect($cbagian)->isEmpty()) {
            $bagian = 0;
        } else {
            $bagian = count($cbagian);
        }
        if (collect($cuser_id)->isEmpty()) {
            $user_id = 0;
        } else {
            $user_id = count($cuser_id);
        }
        $max = collect([
            [$nomor_spt],
            [$tgl_spt],
            [$nomor_spd],
            [$tgl_spd],
            [$tujuan],
            [$berangkat],
            [$pulang],
            [$bagian],
            [$user_id],

        ])->max();
        
        for ($i=0; $i < $max; $i++) { 

            $spd = spd::where('nomor_spt', $cnomor_spt[$i])
                      ->where('tgl_spt', $ctgl_spt[$i])
                      ->where('nomor_spd', $cnomor_spd[$i])
                      ->where('tgl_spd', $ctgl_spd[$i])
                      ->where('tujuan', $ctujuan[$i])
                      ->where('berangkat', $cberangkat[$i])
                      ->where('pulang', $cpulang[$i])
                      ->where('bagian', $cbagian[$i])
                      ->where('user_id', $cuser_id[$i])       
                    ->get(); 
        
        return $spd;

            return view('/pdinas/unduh');

        
        }
    }
}
