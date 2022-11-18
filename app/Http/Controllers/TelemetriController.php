<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\telemetri;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelemetriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('guest/api');
    }
    
    public function tanjungpinang(Request $request)
    {
        if ($request->eop == null || $request->sop == null) {
        $periode = date('d-m-Y', strtotime('-7 days'));
        $periode1 = today();
        $group = $request->group;
        } else {
        $periode = $request->sop;
        $periode1 = $request->eop;
        $group = $request->group;
        }
        // range tanggal
        $date = explode('-',$periode);
        $tgl = $date[0];
        $bln = $date[1];
        $thn = $date[2];
        
        $date1 = explode('-',$periode1);
        $tgl1 = $date1[0];
        $bln1 = $date1[1];
        $thn1 = $date1[2];
        // 

        $con = Http::withBasicAuth('bintan', 'bintan')->get('http://telemetri.online/reportx.htm' , [
            'auth' => ['bintan','bintan'],
            'locid' => 501,
            'itemid' => 653,
            'sop' =>$thn.$bln.$tgl.'000000',
            'eop' =>$thn1.$bln1.$tgl1.'235959',
            'groupBy' => $group,
        ]);

        $response = $con->body();
        
        $doc = new DOMDocument();
        $doc->loadHTML($response);
        $rawdata = $doc->getElementsByTagName('td');

        //Data Api Array
        foreach($rawdata as $data) {
            $Data[] = trim($data->textContent); 
        }

        $header = ['Timestamp','WindSpeed','WindDirection','Temperature','Humidity','Rain','BarometicPressurembar','BatteryVolt'];
        $countdetail = count($Data) - 51;
        for($i = 8;$i < $countdetail ;$i++) {
            $detailx[] = $Data[$i];
        }
        //perhitungan total data detail
        $i = 0;
        $j = 0;
        foreach($detailx as $detaily) {
            $detailcount[$j][] = $detaily;
            $i = $i + 1;
            $j = $i % count($header) == 0 ? $j + 1 : $j ;
        }

        //penggabungan data detail dan header
        for ($i = 0; $i < count($detailcount); $i++) {
            for ($j = 0 ; $j < count($header) ; $j++) {
                $datafix[$i][$header[$j]] = $detailcount[$i][$j];
            }
        }
        
        
        return response([
            'success' => true,
            'message' => "list data",
            'data' => $datafix
        ], 200);
        // return $response;

    }

    public function batam(Request $request)
    {
        if ($request->eop == null || $request->sop == null) {
            $periode = date('d-m-Y', strtotime('-7 days'));
            $periode1 = today();
            $group = $request->group;
            } else {
            $periode = $request->sop;
            $periode1 = $request->eop;
            $group = $request->group;
            }
            // range tanggal
            $date = explode('-',$periode);
            $tgl = $date[0];
            $bln = $date[1];
            $thn = $date[2];
            
            $date1 = explode('-',$periode1);
            $tgl1 = $date1[0];
            $bln1 = $date1[1];
            $thn1 = $date1[2];
            // 
    
            $con = Http::withBasicAuth('bintan', 'bintan')->get('http://telemetri.online/reportx.htm' , [
                'auth' => ['bintan','bintan'],
                'locid' => 502,
                'itemid' => 655,
                'sop' =>$thn.$bln.$tgl.'000000',
                'eop' =>$thn1.$bln1.$tgl1.'235959',
                'groupBy' => $group,
            ]);
    
            $response = $con->body();
            
            $doc = new DOMDocument();
            $doc->loadHTML($response);
            $rawdata = $doc->getElementsByTagName('td');
    
            //Data Api Array
            foreach($rawdata as $data) {
                $Data[] = trim($data->textContent); 
            }
          
            $header = ['Timestamp','WindSpeed','WindDirection','Temperature','Humidity','Rain'];
            
            $countdetail = count($Data) - 51;
            for($i = 6;$i < $countdetail ;$i++) {
                $detailx[] = $Data[$i];
            }
            //perhitungan total data detail
            $i = 0;
            $j = 0;
            foreach($detailx as $detaily) {
                $detailcount[$j][] = $detaily;
                $i = $i + 1;
                $j = $i % count($header) == 0 ? $j + 1 : $j ;
            }
    
            //penggabungan data detail dan header
            for ($i = 0; $i < count($detailcount); $i++) {
                for ($j = 0 ; $j < count($header) ; $j++) {
                    $datafix[$i][$header[$j]] = $detailcount[$i][$j];
                }
            }
            
            
            return response([
                'success' => true,
                'message' => "list data",
                'data' => $datafix
            ], 200);
            // return $response;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\telemetri  $telemetri
     * @return \Illuminate\Http\Response
     */
    public function show(telemetri $telemetri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\telemetri  $telemetri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, telemetri $telemetri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\telemetri  $telemetri
     * @return \Illuminate\Http\Response
     */
    public function destroy(telemetri $telemetri)
    {
        //
    }
}
