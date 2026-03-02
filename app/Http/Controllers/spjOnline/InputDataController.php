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

class InputDataController extends Controller
{

    //bagian penandatangan
    
    public function index()
    {
        if (Auth::check()) {
        // auth checking 
        $user = user::get();
        
        return view('/spj/inputData',['active' => 'input'], compact('user'));
        } else {
            redirect('/login');
        }
    }

    public function showData()
    {
        $data = spj_data_satker::get(); 
        return response()->json([
            'data'    => $data
        ]);
    }

    public function addData(Request $request) 
    {        
        //definisikan validasi
        $validator = Validator::make($request->all(), [
            'kementerian' => 'required',
            'eselon' => 'required',
            'lokasi' => 'required',
            'satker' => 'required',
            'alamat' => 'required',
            'dipa' => 'required',
            'tgl_dipa' => 'required',
        ]);

        //apabila validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        //bila validasi berhasil create data
        $data = spj_data_satker::create([
            'kementerian' => $request->kementerian,
            'eselon' => $request->eselon,
            'lokasi' => $request->lokasi,
            'satker' => $request->satker,
            'alamat' => $request->alamat,
            'dipa' => $request->dipa,
            'tgl_dipa' => $request->tgl_dipa,
        ]);
        
        //mengembalikan data berhasil
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $data  
        ]);
    }
    //bagian penandatangan selesai

    public function deleteData(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        //apabila validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = spj_data_satker::where('id', '=', $request->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $data  
        ]);
    }

}
