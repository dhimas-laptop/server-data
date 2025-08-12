<?php

namespace App\Http\Controllers\spjOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user; 
use App\Models\spj_data_satker;
use App\Models\spj_data_ttd;
use App\Models\spj_data_perjadin;
use App\Models\spj_data_rincian;
use App\Models\spj_rincian_lumsum;
use App\Models\spj_rincian_penginapan;
use App\Models\spj_rincian_transport;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


// checking authentication
// if (Auth::check()) {
//         // auth checking 
//         $user = user::get();
//         
//         return view('',['active' => ''], compact('user'));
//         } else {
//             redirect('/login');
//         }

class TTDController extends Controller
{

    //bagian penandatangan
    
    public function penandatangan()
    {
        if (Auth::check()) {
        // auth checking 
        $user = user::get();

        $data = spj_data_ttd::get();

        return view('spj/ttd',['active' => 'ttd'], compact('user'));
        } else {
            redirect('/login');
        }
    }

    public function indexPenandatangan()
    {
        $data = spj_data_ttd::get(); 
        return response()->json([
            'data'    => $data
        ]);
    }

    public function tambahPenandatangan(Request $request) 
    {        
        //definisikan validasi
        $validator = Validator::make($request->all(), [
            'nama_ttd' => 'required',
            'nip_ttd' => 'required',
            'jabatan_ttd' => 'required'
        ]);

        //apabila validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        //bila validasi berhasil create data
        $data = spj_data_ttd::create([
            'nama_ttd' => $request->nama_ttd,
            'nip_ttd' => $request->nip_ttd,
            'jabatan_ttd' => $request->jabatan_ttd
        ]);
        
        //mengembalikan data berhasil
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $data  
        ]);
    }
    //bagian penandatangan selesai

    public function hapusPenandatangan(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        //apabila validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = spj_data_ttd::where('id', '=', $request->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $data  
        ]);
    }

}
