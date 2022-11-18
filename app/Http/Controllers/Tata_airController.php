<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Tata_airController extends Controller
{
    public function curah_hujan()
    {
        return view('/tata_air/curah_hujan', ['active' => 'curah_hujan', 'no' => 1]);
    }

    public function filter_ch(Request $request)
    {
        $response = Http::get('https://bpdas-sjd.id/api/batam', [
            'sop' => $request->sop,
            'eop' => $request->eop,
            'group' => $request->group
        ]);
        $detail = json_decode($response,true);
        
        $response1 = Http::get('https://bpdas-sjd.id/api/tanjung-pinang', [
            'sop' => $request->sop,
            'eop' => $request->eop,
            'group' => $request->group
        ]);
        $detail1 = json_decode($response1,true);

        return view('/tata_air/curah_hujan_view', ['data' => $detail,'data1' => $detail1, 'active' => 'curah_hujan', 'no' => 1]);
    }
    
    public function tma()
    {
        if (Gate::check('admin')) {
            return view('/tata_air/tma', ['active' => 'tma']);
        }
        return redirect('/');
    }

    public function debit_air()
    {
        if (Gate::check('admin')) {
            return view('/tata_air/debit_air', ['active' => 'debit_air']);
        }
        return redirect('/');
    }

    public function grafik()
    {
        if (Gate::check('admin')) {
            return view('/tata_air/grafik', ['active' => 'grafik']);
        }
        return redirect('/');
    }

}
