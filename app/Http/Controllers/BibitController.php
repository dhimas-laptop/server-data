<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class BibitController extends Controller
{
   private $client;
   public function __construct()
   {
      $this->client = new Client([
         // Base URI is used with relative requests
         'base_uri' => 'https://bibit.bpdas-sjd.id/API/',
         // You can set any number of default request options.
     ]);
   }
   public function bibit()
   {
      if (Gate::check('admin')) {
         $response = Http::get('https://bibit.bpdas-sjd.id/API/bibit');
         $detail = json_decode($response,true);
         
         return view('/bibit/bibit/bibit', ['data' => $detail , 'active' => 'bibit', 'no' => 1]);
     }
     return redirect('/');
   }

   public function tambah(Request $request)
   {
      
      $result = $this->client->request('POST', 'bibit', [
         'form_params' => [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
         ]
     ]);
         $responseresult = json_decode($result->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
     
            return redirect('/bibit')->with(['success' => 'Data Berhasil Di input']);
         } else {     
            return redirect('/bibit')->with(['error' => 'Data Gagal Di input']);
         }
         

   }

   public function hapus($id)
   {
      
      $result = $this->client->request('POST', 'bibit/delete', [
         'form_params' => [
            'id' => $id
         ]
      ]);
         $responseresult = json_decode($result->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
            return redirect('/bibit')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/bibit')->with(['error' => $responseresult['message']]);
         }
         

   }

}
