<?php

namespace App\Http\Controllers;

use App\Models\spd;
use App\Models\user; 
use App\Models\gambar;    
use App\Models\gambar_spd;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Exports\SpdExport;
use App\Imports\PdinasImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Foreach_;

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
        $auth = auth::user()->id;
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        }
        
        if (auth::user()->role !== 'admin' || auth::user()->nip !== "198105052010122002") {
            $spd = spd::where('tgl_spt' , $today)
                ->where('nomor_spt','LIKE','%'.$role.'%')
                ->get();
        } 
        if (auth::user()->role === 'admin' || auth::user()->nip === "198105052010122002") {
            $spd = spd::where('tgl_spt' , $today)->get();
        }
        
        return view('pdinas', ['spd' => $spd , 'active' => "tanggal" , 'no' => 1], compact('user'));
        
    }

    public function index2()
    {
        $user = user::get();
        $today = today(); 
        $bulan = date('m', strtotime($today));
        $tahun = date('Y', strtotime($today));
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $auth = auth::user()->id;
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        }
        if (auth::user()->role !== 'admin' || auth::user()->nip !== "198105052010122002") {
            $spd = spd::whereMonth('tgl_spt' , $bulan)->whereYear('tgl_spt' , $tahun)->where('nomor_spt','LIKE','%'.$role.'%')->get();
        }
        if (auth::user()->role === 'admin' || auth::user()->nip === "198105052010122002") {
            $spd = spd::whereMonth('tgl_spt' , $bulan)->whereYear('tgl_spt' , $tahun)->get();
        }
       
        return view('pdinas', ['spd' => $spd , 'active' => "bulan", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function index3()
    {
        $user = user::get();
        $today = today(); 
        $tahun = date('Y', strtotime($today));
        $auth = auth::user()->id;
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $role = auth::user()->role;
        
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        } 
        if (auth::user()->role !== 'admin' || auth::user()->nip !== "198105052010122002") {
            $spd = spd::whereYear('tgl_spt' , $tahun)->where('nomor_spt','LIKE','%'.$role.'%')->get();
        }
        if (auth::user()->role === 'admin'|| auth::user()->nip === "198105052010122002") {
            $spd = spd::whereYear('tgl_spt' , $tahun)->get();
        }
        
        return view('pdinas', ['spd' => $spd , 'active' => "tahun", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function filter1(Request $request)
    {
        $request->validate([
            'filter' => 'required'
        ]);

        $user = user::get();
        $auth = auth::user()->id;
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        } 
        if (auth::user()->role !== 'admin' || auth::user()->nip !== "198105052010122002") {
            $spd = spd::where('tgl_spt', $request->filter)
            ->where('nomor_spt','LIKE','%'.$role.'%')
            ->get();
        }
        if (auth::user()->role === 'admin' || auth::user()->nip === "198105052010122002") {
            $spd = spd::where('tgl_spt', $request->filter)->get();
        }
        
        
        return view('pdinas', ['spd' => $spd , 'active' => "tanggal", 'no' => 1], compact('user'));
        
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
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $auth = auth::user()->id;
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        } 
        if (auth::user()->role !== 'admin'|| auth::user()->nip !== "198105052010122002") {
            $spd = spd::whereMonth('tgl_spt' , $request->filter1)
                    ->whereYear('tgl_spt' , $tahun)
                    ->where('nomor_spt','LIKE','%'.$role.'%')
                    ->get();
        }
        if (auth::user()->role === 'admin'|| auth::user()->nip === "198105052010122002") {
            $spd = spd::whereMonth('tgl_spt' , $request->filter1)
                    ->whereYear('tgl_spt' , $tahun)
                    ->get();
        }
        
        return view('pdinas', ['spd' => $spd , 'active' => "bulan", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }

    public function filter3(Request $request)
    {
        $request->validate([
            'filter2' => 'required'
        ]);

        $user = user::get();
        $tahun = date('Y', strtotime($request->filter2));
        $tahun1 = spd::selectRaw('YEAR(tgl_spt) as tgl_spt')->distinct()->get();
        $auth = auth::user()->id;
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "pkdas";
        } elseif ($role === 'prog') {
            $role = "pevdas";
        } elseif ($role === 'rhl') {
            $role = "rhl";
        } elseif ($role === 'tu') {
            $role = "tu";
        } 
        
        if (auth::user()->role !== 'admin' || auth::user()->nip !== "198105052010122002") {
    
            $spd = spd::whereYear('tgl_spt' , $tahun)
            ->where('nomor_spt','LIKE','%'.$role.'%')
            ->get();
            
        }

        if (auth::user()->role === 'admin'|| auth::user()->nip === "198105052010122002") {
            $spd = spd::whereYear('tgl_spt' , $tahun)
            ->get();
        }
       
        
        return view('pdinas', ['spd' => $spd , 'active' => "bulan", 'tahun' => $tahun1, 'no' => 1], compact('user'));
        
    }


    public function proses_tambah(Request $request)
    {
        
        $validate = $request->validate([
            'nomor_spt' => 'required',
            'tgl_spt' => 'required',
            'nomor_spd' => 'nullable',
            'tgl_spd' => 'nullable',
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

        ]);    
        // $request->validate(['gambar.*' => 'file']);
       
     if ($validate['nama_lain'] == null) {
        $total = count($validate['user_id']);
        for($i=0; $i<$total; $i++){
            $validate['user_id'] = $request->user_id[$i];
            spd::insert($validate);  
        }  
     } else {
        spd::insert($validate);
     }
        
        

        // foreach ($request->file('gambar') as $gambar) {
        //     $nama_gambar = time() . '.' . $gambar->extension();
        //     $gambar->move(public_path('bukti/'), $nama_gambar);                  
        //     gambar::insert(['gambar' => $nama_gambar]);
        //     $id_gambar = gambar::max('id');
        //     foreach ($id_spd as $key) { 
        //         gambar_spd::create([
        //             'gambar_id' => $id_gambar,
        //             'spd_id' => $key
        //         ]);
        //     }
        //     }
            
        return back()->with('success', 'Data Berhasil Di input');

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
                'no_spm'=> $request->spm,
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
            
        return redirect()->action([PdinasController::class , 'index3'])->with('success', 'Data Berhasil Di update');
            
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
                
        return redirect()->action([PdinasController::class , 'index3'])->with('success', 'Data Berhasil Di update');

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
        
        return view('pdinas/detail',['spd' => $spd, 'active' => 'perjalanan-dinas']);
    }

    public function download()
    {
        $role = auth::user()->role;
        if ($role === 'ev') {
            $role = "PKDAS";
        } elseif ($role === 'prog') {
            $role = "PEVDAS";
        } elseif ($role === 'rhl') {
            $role = "RHL";
        } elseif ($role === 'tu') {
            $role = "TU";
        }
        
        $spd = spd::select('nomor_spt')->distinct()->get();
        
        foreach ($spd as $key) {
            $data = explode('/',$key->nomor_spt);
            $data1 = $data[2];
            if ($data1 == $role) {
                $data2[] = $key->nomor_spt; 
            }
            if ($role === 'admin') {
                $data2[] = $key->nomor_spt; 
            }
        }
        return view('/pdinas/download',['spd' => $data2, 'active' => 'perjalanan-dinas']);
    }

    public function downloadget($id)
    {
        $gambar = gambar::findOrFail($id);
        
        return response()->file(asset('bukti/'.$gambar->gambar));  
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

    public function view()
    {
        $spd = spd::get();
        return view('/report/spd',['spd' => $spd, 'data' => '02']);
    }

    public function export()
    {
        return view('/pdinas/export',['active' => 'perjalanan-dinas']);
    }
    public function exportpost()
    {
        Excel::import(new PdinasImport, request()->file('file'));
    }

    public function test()
    {
        $spd = spd::findOrFail(68);
        
        dd($spd);
    }


}
