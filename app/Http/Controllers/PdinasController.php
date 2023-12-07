<?php

namespace App\Http\Controllers;

use App\Models\spd;
use App\Models\user; 
use App\Models\gambar;    
use App\Models\gambar_spd;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Exports\SpdExport;
use App\Exports\SpdExport1;
use App\Exports\SpdExport2;
use App\Exports\SpdExport3;
use App\Imports\PdinasImport;
use App\Models\spd1;
use App\Models\spd2;
use App\Models\spd3;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\Isset_;
use PhpParser\Node\Stmt\Foreach_;

class PdinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 524111------------------------------------------------------------------------------------------------------------------

    public function index()
    {
        $user = user::get();
        $today = today(); 
        $tahun = date('Y', strtotime($today));
        $auth = auth::user()->id;
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $role = auth::user()->role;
        
        $spd = spd::whereYear('tgl_spt' , $tahun)->orWhere('user_id', $auth)->orderBy("id", "desc")->get();    
            
        return view('pdinas/pdinas', ['spd' => $spd , 'active' => "tahun", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function filter(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);
        $user = user::get();
        $tahun= $request->filter2;
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $auth = auth::user()->id;
        $role = auth::user()->role;
       
     
        $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        
       
        
        return view('pdinas/pdinas', ['spd' => $spd , 'active' => "tahun", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function proses_tambah(Request $request)
    {
        // convert data masking
        $request['uang_harian'] = str_replace("Rp. ","",$request['uang_harian']);
        $request['uang_harian'] = str_replace(".","",$request['uang_harian']);
        $request['uang_harian'] = (int) $request['uang_harian'];

        $request['harga_pesawat'] = str_replace("Rp. ","",$request['harga_pesawat']);
        $request['harga_pesawat'] = str_replace(".","",$request['harga_pesawat']);
        $request['harga_pesawat'] = (int) $request['harga_pesawat'];

        $request['taxi'] = str_replace("Rp. ","",$request['taxi']);
        $request['taxi'] = str_replace(".","",$request['taxi']);
        $request['taxi'] = (int) $request['taxi'];
        
        $request['harga_hotel'] = str_replace("Rp. ","",$request['harga_hotel']);
        $request['harga_hotel'] = str_replace(".","",$request['harga_hotel']);
        $request['harga_hotel'] = (int) $request['harga_hotel'];

        $request['total'] = str_replace("Rp. ","",$request['total']);
        $request['total'] = str_replace(".","",$request['total']);
        $request['total'] = (int) $request['total'];
        // convert data masking end

        $validate = $request->validate([
            'nomor_spt' => 'required',
            'tgl_spt' => 'required',
            'nomor_spd' => 'nullable',
            'tgl_spd' => 'nullable',
            'no_spm' => 'nullable',
            'tujuan' => 'required',
            'berangkat' => 'required',
            'pulang' => 'required',
            'uang_harian' => 'nullable',
            'pesawat' => 'nullable',
            'no_penerbangan' => 'nullable',
            'no_tiket' => 'nullable',
            'kode_booking' => 'nullable',
            'harga_pesawat' => 'nullable',
            'taxi' => 'nullable',
            'hotel' => 'nullable',
            'harga_hotel' => 'nullable',
            'no_telp' => 'nullable',
            'provinsi' => 'nullable',
            'total' => 'nullable',
            'user_id' => 'nullable',
            'nama_lain' => 'nullable',
            'no_lain' => 'nullable',
            'status_lain' => 'nullable',
            'kode' => 'required'
        ]);    

        $validate['nomor_spt'] = strtoupper($request->nomor_spt);
        $validate['nomor_spd'] = strtoupper($request->nomor_spd);
        $validate['no_spm'] = strtoupper($request->no_spm);
        $validate['tujuan'] = strtoupper($request->tujuan);
        $validate['pesawat'] = strtoupper($request->pesawat);
        $validate['no_penerbangan'] = strtoupper($request->no_penerbangan);
        $validate['no_tiket'] = strtoupper($request->no_tiket);
        $validate['kode_booking'] = strtoupper($request->kode_booking);
        $validate['hotel'] = strtoupper($request->hotel);
        $validate['provinsi'] = strtoupper($request->provinsi);
        $validate['nama_lain'] = strtoupper($request->nama_lain);
        
        // $request->validate(['gambar.*' => 'file']);
        if ($validate['nama_lain'] == null) {
            $total = count($validate['user_id']);
            for($i=0; $i<$total; $i++){
                $validate['user_id'] = $request->user_id[$i];
                spd::insert($validate);  
            }  
        } else {
            $validate['user_id']= null;
            spd::insert($validate);
        }
        return redirect('/perjalanan-dinas/524111')->with('success', 'Data Berhasil Di tambah');
    }

    public function update($id)
    {
        $spd = spd::findOrFail($id);
        
        return view('/pdinas/update',['spd' => $spd, 'active' => "tahun"]);

    }
    public function update_proses(Request $request)
    {
        // convert data masking
        $request['uang_harian'] = str_replace("Rp. ","",$request['uang_harian']);
        $request['uang_harian'] = str_replace(".","",$request['uang_harian']);
        $request['uang_harian'] = (int) $request['uang_harian'];

        $request['harga_pesawat'] = str_replace("Rp. ","",$request['harga_pesawat']);
        $request['harga_pesawat'] = str_replace(".","",$request['harga_pesawat']);
        $request['harga_pesawat'] = (int) $request['harga_pesawat'];

        $request['taxi'] = str_replace("Rp. ","",$request['taxi']);
        $request['taxi'] = str_replace(".","",$request['taxi']);
        $request['taxi'] = (int) $request['taxi'];
        
        $request['harga_hotel'] = str_replace("Rp. ","",$request['harga_hotel']);
        $request['harga_hotel'] = str_replace(".","",$request['harga_hotel']);
        $request['harga_hotel'] = (int) $request['harga_hotel'];

        $request['total'] = str_replace("Rp. ","",$request['total']);
        $request['total'] = str_replace(".","",$request['total']);
        $request['total'] = (int) $request['total'];
        // convert data masking end

       spd::where('id', $request->id)
            ->update([
                'nomor_spt' => strtoupper($request->no_spt),
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => strtoupper($request->no_spd),
                'tgl_spd' => $request->tgl_spd,
                'no_spm'=> strtoupper($request->no_spm),
                'tujuan'=> strtoupper($request->tujuan),
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'uang_harian' => $request->uang_harian,
                'pesawat' => strtoupper($request->pesawat),
                'no_penerbangan' => strtoupper($request->no_penerbangan),
                'no_tiket' => strtoupper($request->no_tiket),
                'kode_booking' => strtoupper($request->kode_booking),
                'harga_pesawat' => $request->harga_pesawat,
                'taxi' => $request->taxi,
                'hotel' => strtoupper($request->hotel),
                'harga_hotel' => $request->harga_hotel,
                'no_telp' => $request->no_telp,
                'provinsi' => strtoupper($request->provinsi),
                'total' => $request->total,
                'kode' => $request->kode
            ]);
            
        return redirect('/perjalanan-dinas/524111')->with('success', 'Data Berhasil Di update');
            
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
        
        if(spd::select('*')->where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus'); 
        } else {
            return redirect()->back()->with('error', 'Data gagal Dihapus');
        }
       
    }

    public function detail($id)
    {
        $spd = spd::findOrFail($id);
        
        return view('pdinas/detail',['spd' => $spd,  'active' => "tahun"]);
    }

    public function download()
    {
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
            $role1 = "PKDAS";
        } elseif ($role === 'prog') {
            $role = "pevdas";
            $role1 = "PEVDAS";
        } elseif ($role === 'rhl') {
            $role = "rhl";
            $role1 = "RHL";
        } elseif ($role === 'tu') {
            $role = "tu";
            $role1 = "TU";
        } elseif ($role ==='admin') {
            $role1 = "admin";
        }
        
        $spd = spd::select('nomor_spt')->distinct()->get();
        
        foreach ($spd as $key) {
            $data = explode('/',$key->nomor_spt);
            $data1 = $data[2];
            if ($role === 'admin') {
                $data2[] = $key->nomor_spt; 
            }
            if ($data1 == $role || $data1 == $role1) {
                $data2[] = $key->nomor_spt; 
            }
        }
        return view('/pdinas/download',['spd' => $data2, 'active' => "tahun"]);
    }

    public function downloadfilter(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);
        $spt = explode('.', $request->filter2);
        $spt1= explode('/', $spt[1]);
        $spt2= $spt1[0];
        $role = auth::user()->role;
        return (new SpdExport)->forYear($request->filter2)->forRole($role)->download('Perjalanan-Dinas'.'-'.'ST-'.$spt2.'.xlsx');
    }

    public function export()
    {
        return view('/pdinas/export',['active' => 'perjalanan-dinas']);
    }
    public function exportpost()
    {
        Excel::import(new PdinasImport, request()->file('file'));
    }


    // 524111 END------------------------------------------------------------------------------------------------------------------
    
    
    // 524114------------------------------------------------------------------------------------------------------------------

    public function index1()
    {
        $user = user::get();
        $today = today(); 
        $tahun = date('Y', strtotime($today));
        $auth = auth::user()->id;
        $tahun1 = spd1::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $role = auth::user()->role;
        $spd = spd1::whereYear('tgl_spt' , $tahun)->orWhere('user_id', $auth)->orderBy("id", "desc")->get();
        
        return view('pdinas/pdinas1', ['spd' => $spd , 'active' => "524114" ,'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function filter1(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);

        $user = user::get();
        $tahun = $request->filter2;
        $tahun1 = spd1::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $auth = auth::user()->id;
        $role = auth::user()->role;

       
            $spd = spd1::whereYear('tgl_spt' , $tahun)
            ->orWhere('user_id', $auth)
            ->get();
       
        
        return view('pdinas/pdinas1', ['spd' => $spd , 'active' => "524114", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function tambah_524114(Request $request)
    {
        // convert data masking
        $request['total'] = str_replace("Rp. ","",$request['total']);
        $request['total'] = str_replace(".","",$request['total']);
        $request['total'] = (int) $request['total'];
        // convert data masking end

        $validate = $request->validate([
            'nomor_spt' => 'required',
            'tgl_spt' => 'required',
            'nomor_spd' => 'nullable',
            'tgl_spd' => 'nullable',
            'no_spm' => 'nullable',
            'tujuan' => 'required',
            'berangkat' => 'required',
            'pulang' => 'required',
            'total' => 'nullable',
            'user_id' => 'nullable',
            'nama_lain' => 'nullable',
            'no_lain' => 'nullable',
            'status_lain' => 'nullable',
            'kode' => 'required',
            'jenis' => 'nullable'
        ]);

        $validate['nomor_spt'] = strtoupper($request->nomor_spt);
        $validate['nomor_spd'] = strtoupper($request->nomor_spd);
        $validate['no_spm'] = strtoupper($request->no_spm);
        $validate['tujuan'] = strtoupper($request->tujuan);
        $validate['nama_lain'] = strtoupper($request->nama_lain);

        if (isset($request->jenis)) {
            $validate['jenis'] = implode(",",$request->jenis);
        }
        
        if (isset($validate['user_id']) || $validate['nama_lain'] !== null) {
            if ($validate['nama_lain'] == null) {
                $total = count($validate['user_id']);
                for($i=0; $i<$total; $i++){
                    $validate['user_id'] = $request->user_id[$i];
                    spd1::insertGetId($validate);  
                }  
            } else {
                $validate['user_id']= null;
                spd1::insertGetId($validate);
            }
                    
                return back()->with('success', 'Data Berhasil Di input');
        } else {
            return back()->with('error', 'Pelaksana belum diisi');
        }
        
    }

    public function detail1($id)
    {
        $spd = spd1::findOrFail($id);
        
        return view('pdinas/detail1',['spd' => $spd, 'active' => "524114"]);
    }

    public function download_524114()
    {
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
            $role1 = "PKDAS";
        } elseif ($role === 'prog') {
            $role = "pevdas";
            $role1 = "PEVDAS";
        } elseif ($role === 'rhl') {
            $role = "rhl";
            $role1 = "RHL";
        } elseif ($role === 'tu') {
            $role = "tu";
            $role1 = "TU";
        } elseif ($role ==='admin') {
            $role1 = "admin";
        }
        
        $spd = spd1::select('nomor_spt')->distinct()->get();
        
        foreach ($spd as $key) {
            $data = explode('/',$key->nomor_spt);
            $data1 = $data[2];
            if ($data1 == $role || $data1 == $role1) {
                $data2[] = $key->nomor_spt; 
            }
            if ($role === 'admin') {
                $data2[] = $key->nomor_spt; 
            }

            if (isset($data2)) {
               return view('/pdinas/download1',['spd' => $data2, 'active' => "524114"]);
            }
        }
        
    }

    public function downloadfilter524114(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);
        $spt = explode('.', $request->filter2);
        $spt1= explode('/', $spt[1]);
        $spt2= $spt1[0];
        $role = auth::user()->role;
        return (new SpdExport1)->forYear($request->filter2)->forRole($role)->download('Perjalanan-Dinas'.'-'.'ST-'.$spt2.'.xlsx');
    }

    
    public function update1($id)
    {
        $spd = spd1::findOrFail($id);
        
        return view('/pdinas/update1',['spd' => $spd,  'active' => "524114"]);

    }
    public function update_proses1(Request $request)
    {
        // convert data masking
        $request['total'] = str_replace("Rp. ","",$request['total']);
        $request['total'] = str_replace(".","",$request['total']);
        $request['total'] = (int) $request['total'];
        // convert data masking end

        

        if (isset($request->jenis)) {
            $request['jenis'] = implode(",",$request->jenis);
            spd1::where('id', $request->id)
            ->update([
                'nomor_spt' => strtoupper($request->no_spt),
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => strtoupper($request->no_spd),
                'tgl_spd' => $request->tgl_spd,
                'no_spm'=> strtoupper($request->no_spm),
                'tujuan'=> strtoupper($request->tujuan),
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'total' => $request->total,
                'kode' => $request->kode,
                'jenis' =>$request->jenis
            ]);
        } else {
            spd1::where('id', $request->id)
            ->update([
                'nomor_spt' => strtoupper($request->no_spt),
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => strtoupper($request->no_spd),
                'tgl_spd' => $request->tgl_spd,
                'no_spm'=> strtoupper($request->no_spm),
                'tujuan'=> strtoupper($request->tujuan),
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'total' => $request->total,
                'kode' => $request->kode,
            ]);
        }
      
            
        return redirect('/perjalanan-dinas/524114')->with('success', 'Data Berhasil Di update');
            
    } 

    public function hapus1($id)
    {       
        if(spd1::select('*')->where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus'); 
        } else {
            return redirect()->back()->with('error', 'Data gagal Dihapus');
        }
       
    }
// 524114 END------------------------------------------------------------------------------------------------------------------
    
// 524119------------------------------------------------------------------------------------------------------------------

public function index2()
{
    $user = user::get();
    $today = today(); 
    $tahun = date('Y', strtotime($today));
    $auth = auth::user()->id;
    $tahun1 = spd2::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
    $role = auth::user()->role;
    
    
        $spd = spd2::whereYear('tgl_spt' , $tahun)
        ->orWhere('user_id', $auth)
        ->orderBy("id", "desc")
        ->get();

    
    return view('pdinas/pdinas2', ['spd' => $spd , 'active' => "524119" ,'tahun' => $tahun1, 'no' => 1], compact('user'));
    
}

public function filter2(Request $request)
{
    $request->validate([
        'filter2' => 'required'
    ]);

    $user = user::get();
    $tahun = $request->filter2;;
    $tahun1 = spd2::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
    $auth = auth::user()->id;
    $role = auth::user()->role;
   
        $spd = spd2::whereYear('tgl_spt' , $tahun)
        ->orWhere('user_id', $auth)
        ->get();
    
   
    
    return view('pdinas/pdinas2', ['spd' => $spd , 'active' => "524119", 'tahun' => $tahun1, 'no' => 1], compact('user'));
    
}

public function tambah_524119(Request $request)
{
    // convert data masking
    $request['total'] = str_replace("Rp. ","",$request['total']);
    $request['total'] = str_replace(".","",$request['total']);
    $request['total'] = (int) $request['total'];
    // convert data masking end

    $validate = $request->validate([
        'nomor_spt' => 'required',
        'tgl_spt' => 'required',
        'nomor_spd' => 'nullable',
        'tgl_spd' => 'nullable',
        'no_spm' => 'nullable',
        'tujuan' => 'required',
        'berangkat' => 'required',
        'pulang' => 'required',
        'uang_harian' => 'nullable',
        'total' => 'nullable',
        'user_id' => 'nullable',
        'nama_lain' => 'nullable',
        'no_lain' => 'nullable',
        'status_lain' => 'nullable',
        'kode' => 'required',
        'jenis' => 'nullable'
    ]);    

        $validate['nomor_spt'] = strtoupper($request->nomor_spt);
        $validate['nomor_spd'] = strtoupper($request->nomor_spd);
        $validate['no_spm'] = strtoupper($request->no_spm);
        $validate['tujuan'] = strtoupper($request->tujuan);
        $validate['nama_lain'] = strtoupper($request->nama_lain);

    if (isset($request->jenis)) {
        $validate['jenis'] = implode(",",$request->jenis);
    }
    
    if (isset($validate['user_id']) || $validate['nama_lain'] !== null) {
        if ($validate['nama_lain'] == null) {
            $total = count($validate['user_id']);
            for($i=0; $i<$total; $i++){
                $validate['user_id'] = $request->user_id[$i];
                spd2::insertGetId($validate);  
            }  
        } else {
            $validate['user_id']= null;
            spd2::insertGetId($validate);
        }
                
            return back()->with('success', 'Data Berhasil Di input');
    } else {
        return back()->with('error', 'Pelaksana belum diisi');
    }
    
}

public function detail2($id)
{
    $spd = spd2::findOrFail($id);
    
    return view('pdinas/detail2',['spd' => $spd, 'active' => "524119"]);
}

public function download_524119()
{
    $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
            $role1 = "PKDAS";
        } elseif ($role === 'prog') {
            $role = "pevdas";
            $role1 = "PEVDAS";
        } elseif ($role === 'rhl') {
            $role = "rhl";
            $role1 = "RHL";
        } elseif ($role === 'tu') {
            $role = "tu";
            $role1 = "TU";
        } elseif ($role ==='admin') {
            $role1 = "admin";
        }
    
    $spd = spd2::select('nomor_spt')->distinct()->get();
    
    foreach ($spd as $key) {
        $data = explode('/',$key->nomor_spt);
        $data1 = $data[2];
        if ($data1 == $role || $data1 == $role1) {
            $data2[] = $key->nomor_spt; 
        }
        if ($role === 'admin') {
            $data2[] = $key->nomor_spt; 
        }

        if (isset($data2)) {
           return view('/pdinas/download2',['spd' => $data2, 'active' => "524119"]);
        }
    }
    
}

public function downloadfilter524119(Request $request)
{
    $request->validate([
        'filter2' => 'required'
    ]);
    $spt = explode('.', $request->filter2);
    $spt1= explode('/', $spt[1]);
    $spt2= $spt1[0];
    $role = auth::user()->role;
    return (new SpdExport2)->forYear($request->filter2)->forRole($role)->download('Perjalanan-Dinas'.'-'.'ST-'.$spt2.'.xlsx');
}


public function update2($id)
{
    $spd = spd2::findOrFail($id);
    
    return view('/pdinas/update2',['spd' => $spd, 'active' => "524119"]);

}
public function update_proses2(Request $request)
{
    // convert data masking
        $request['total'] = str_replace("Rp. ","",$request['total']);
        $request['total'] = str_replace(".","",$request['total']);
        $request['total'] = (int) $request['total'];
        // convert data masking end

        if (isset($request->jenis)) {
            $request['jenis'] = implode(",",$request->jenis);
            spd2::where('id', $request->id)
            ->update([
                'nomor_spt' => strtoupper($request->no_spt),
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => strtoupper($request->no_spd),
                'tgl_spd' => $request->tgl_spd,
                'no_spm'=> strtoupper($request->no_spm),
                'tujuan'=> strtoupper($request->tujuan),
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'total' => $request->total,
                'kode' => $request->kode,
                'jenis' =>$request->jenis
            ]);
        } else {
            spd2::where('id', $request->id)
            ->update([
                'nomor_spt' => $request->no_spt,
                'tgl_spt' => $request->tgl_spt,
                'nomor_spd' => $request->no_spd,
                'tgl_spd' => $request->tgl_spd,
                'no_spm'=> $request->no_spm,
                'tujuan'=> $request->tujuan,
                'berangkat' => $request->berangkat,
                'pulang' => $request->pulang,
                'total' => $request->total,
                'kode' => $request->kode
            ]);
        }
        
    return redirect('/perjalanan-dinas/524119')->with('success', 'Data Berhasil Di update');
        
} 

public function hapus2($id)
{       
    if(spd2::select('*')->where('id', $id)->delete()) {
        return redirect()->back()->with('success', 'Data Berhasil Dihapus'); 
    } else {
        return redirect()->back()->with('error', 'Data gagal Dihapus');
    }
   
}
// 524119 END------------------------------------------------------------------------------------------------------------------

// 524113------------------------------------------------------------------------------------------------------------------

public function index3()
{
    $user = user::get();
    $today = today(); 
    $tahun = date('Y', strtotime($today));
    $auth = auth::user()->id;
    $tahun1 = spd3::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
    $role = auth::user()->role;
    
   
        $spd = spd3::whereYear('tgl_spt' , $tahun)->orWhere('user_id', $auth)->orderBy("id", "desc")->get();
    
    
    return view('pdinas/pdinas3', ['spd' => $spd , 'active' => "524113" ,'tahun' => $tahun1, 'no' => 1], compact('user'));
    
}

public function filter3(Request $request)
{
    $request->validate([
        'filter2' => 'required'
    ]);

    $user = user::get();
    $tahun = $request->filter2;
    $tahun1 = spd3::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
    $auth = auth::user()->id;
    $role = auth::user()->role;
   
        $spd = spd3::whereYear('tgl_spt' , $tahun)
        ->orWhere('user_id', $auth)
        ->get();
   
    
    return view('pdinas/pdinas3', ['spd' => $spd , 'active' => "524113", 'tahun' => $tahun1, 'no' => 1], compact('user'));
    
}

public function tambah_524113(Request $request)
{
    // convert data masking
    $request['total'] = str_replace("Rp. ","",$request['total']);
    $request['total'] = str_replace(".","",$request['total']);
    $request['total'] = (int) $request['total'];
    // convert data masking end
    
    $validate = $request->validate([
        'nomor_spt' => 'required',
        'tgl_spt' => 'required',
        'nomor_spd' => 'nullable',
        'tgl_spd' => 'nullable',
        'no_spm' => 'nullable',
        'tujuan' => 'required',
        'berangkat' => 'required',
        'pulang' => 'required',
        'uang_harian' => 'nullable',
        'total' => 'nullable',
        'user_id' => 'nullable',
        'nama_lain' => 'nullable',
        'no_lain' => 'nullable',
        'status_lain' => 'nullable',
        'kode' => 'required'
    ]);
    
        $validate['nomor_spt'] = strtoupper($request->nomor_spt);
        $validate['nomor_spd'] = strtoupper($request->nomor_spd);
        $validate['no_spm'] = strtoupper($request->no_spm);
        $validate['tujuan'] = strtoupper($request->tujuan);
        $validate['nama_lain'] = strtoupper($request->nama_lain);
        $validate['status_lain'] = strtoupper($request->status_lain);
    
    if (isset($validate['user_id']) || $validate['nama_lain'] !== null) {
        if ($validate['nama_lain'] == null) {
            $total = count($validate['user_id']);
            for($i=0; $i<$total; $i++){
                $validate['user_id'] = $request->user_id[$i];
                spd3::insertGetId($validate);  
            }  
        } else {
            $validate['user_id']= null;
            spd3::insertGetId($validate);
        }
                
            return back()->with('success', 'Data Berhasil Di input');
    } else {
        return back()->with('error', 'Pelaksana belum diisi');
    }
    
}

public function detail3($id)
{
    $spd = spd3::findOrFail($id);
    
    return view('pdinas/detail3',['spd' => $spd, 'active' => "524113"]);
}

public function download_524113()
{
    $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
            $role1 = "PKDAS";
        } elseif ($role === 'prog') {
            $role = "pevdas";
            $role1 = "PEVDAS";
        } elseif ($role === 'rhl') {
            $role = "rhl";
            $role1 = "RHL";
        } elseif ($role === 'tu') {
            $role = "tu";
            $role1 = "TU";
        } elseif ($role ==='admin') {
            $role1 = "admin";
        }
    
    $spd = spd3::select('nomor_spt')->distinct()->get();
    
    foreach ($spd as $key) {
        $data = explode('/',$key->nomor_spt);
        $data1 = $data[2];
        if ($data1 == $role || $data1 == $role1) {
            $data2[] = $key->nomor_spt; 
        }
        if ($role === 'admin') {
            $data2[] = $key->nomor_spt; 
        }

        if (isset($data2)) {
           return view('/pdinas/download3',['spd' => $data2, 'active' => "524113"]);
        }
    }
    
}

public function downloadfilter524113(Request $request)
{
    $request->validate([
        'filter2' => 'required'
    ]);
    $spt = explode('.', $request->filter2);
    $spt1= explode('/', $spt[1]);
    $spt2= $spt1[0];
    $role = auth::user()->role;
    return (new SpdExport3)->forYear($request->filter2)->forRole($role)->download('Perjalanan-Dinas'.'-'.'ST-'.$spt2.'.xlsx');
}


public function update3($id)
{
    $spd = spd3::findOrFail($id);
    
    return view('/pdinas/update3',['spd' => $spd, 'active' => "524113"]);

}
public function update_proses3(Request $request)
{
    // convert data masking
    $request['total'] = str_replace("Rp. ","",$request['total']);
    $request['total'] = str_replace(".","",$request['total']);
    $request['total'] = (int) $request['total'];
    // convert data masking end
   spd3::where('id', $request->id)
        ->update([
            'nomor_spt' => strtoupper($request->no_spt),
            'tgl_spt' => $request->tgl_spt,
            'nomor_spd' => strtoupper($request->no_spd),
            'tgl_spd' => $request->tgl_spd,
            'no_spm'=> strtoupper($request->no_spm),
            'tujuan'=> strtoupper($request->tujuan),
            'berangkat' => $request->berangkat,
            'pulang' => $request->pulang,
            'total' => $request->total,
            'kode' => $request->kode
        ]);
        
    return redirect('/perjalanan-dinas/524113')->with('success', 'Data Berhasil Di update');
        
} 

public function hapus3($id)
{       
    if(spd3::select('*')->where('id', $id)->delete()) {
        return redirect()->back()->with('success', 'Data Berhasil Dihapus'); 
    } else {
        return redirect()->back()->with('error', 'Data gagal Dihapus');
    }
   
}
// 524113 END------------------------------------------------------------------------------------------------------------------

    public function downloadget($id)
    {
        $gambar = gambar::findOrFail($id);
        
        return response()->file(asset('bukti/'.$gambar->gambar));  
    }

    public function tambah_gambar(Request $request)
    {
        foreach ($request->file('gambar') as $gambar) {
                $nama_gambar = time() . '.' . $gambar->extension();
                $gambar->move(public_path('bukti/'), $nama_gambar);                  
                gambar::insert(['gambar' => $nama_gambar]);
                $id_gambar = gambar::max('id');
                gambar_spd::create([
                        'gambar_id' => $id_gambar,
                        'spd_id' => $request->id
                    ]);
                }
                
        return redirect('/perjalanan-dinas/524111')->with('success', 'Data Berhasil Di update');

    }

    public function test()
    {
        $spd = spd1::get();
        return view('report/spd1', ['spd' => $spd, 'no' => 1]);
    }

    public function view()
    {
        $spd = spd::get();
        return $spd;
    }
}
