<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

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
        
         return view('/bibit/bibit/bibit', ['data' => $detail , 'active' => 'data-bibit', 'no' => 1]);
     }
     return redirect('/');
   }

   public function tambah(Request $request)
   {
      $validator = $request->validate([
         'nama' => 'required',
         'jenis' => 'required',
         'total' => 'required',
         'file' => 'image|required'
      ]);
      
      $file = $validator['nama'].'.'.$request->file->extension();
      
      $result = $this->client->request('POST', 'bibit', [
         'form_params' => [
            'nama' => $validator['nama'],
            'jenis' => $validator['jenis'],
            'total' => $validator['total'],
            'file' => $file,
         ]
     ]);
         $validator['file']->move(public_path('bibit/img/'), $file);

         $responseresult = json_decode($result->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
            return redirect('/data-bibit')->with(['success' => 'Data Berhasil Di input']);
         } else {     
            return redirect('/data-bibit')->with(['error' => 'Data Gagal Di input']);
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
            return redirect('/data-bibit')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-bibit')->with(['error' => $responseresult['message']]);
         }

   }

   // 
   // 
   // order start
   // 
   // 

   public function order()
   {
      
      if (Gate::check('admin')) {
         $response = Http::get('https://bibit.bpdas-sjd.id/API/order');
         $detail = json_decode($response,true);
         
         return view('/bibit/order/order', ['data' => $detail , 'active' => 'data-order', 'no' => 1]);
         
         }
         
         return redirect('/');
         
   }

   public function proses($id)
   {
      
      if (Gate::check('admin')) {
         $response = Http::post('https://bibit.bpdas-sjd.id/API/order', [
               'id' => $id,
               'status' => 'proses'
         ]);

         $responseresult = json_decode($response->getBody()->getContents(), true);

         if ($responseresult['status'] == true) {
            return redirect('/data-order')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-order')->with(['error' => $responseresult['message']]);
         }
         }
         
         return redirect('/');
         
   }
   
   public function selesai($id)
   {
      
      if (Gate::check('admin')) {
         $response = Http::post('https://bibit.bpdas-sjd.id/API/order', [
               'id' => $id,
               'status' => "selesai"
         ]);
         $responseresult = json_decode($response->getBody()->getContents(), true);

         if ($responseresult['status'] == true) {
            return redirect('/data-order')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-order')->with(['error' => $responseresult['message']]);
         }
         }
         
         return redirect('/');
         
   }

   public function tolak($id)
   {
      
      if (Gate::check('admin')) {
         $response = Http::post('https://bibit.bpdas-sjd.id/API/order', [
               'id' => $id,
               'status' => "ditolak"
         ]);
         $responseresult = json_decode($response->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
            return redirect('/data-order')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-order')->with(['error' => $responseresult['message']]);
         }
         }
         
         return redirect('/');
         
   }

   public function hapus_order($id)
   {
      
      if (Gate::check('admin')) {
         $response = Http::post('https://bibit.bpdas-sjd.id/API/order/hapus', [
               'id' => $id,
         ]);
         $responseresult = json_decode($response->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
            return redirect('/data-order')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-order')->with(['error' => $responseresult['message']]);
         }
         }
         
         return redirect('/');
         
   }

   public function download_order($id)
   {
      if (Gate::check('admin')) {
         $response = Http::get('https://bibit.bpdas-sjd.id/API/order-filter', [
            'id' => $id
         ]);
         
         $detail = json_decode($response,true);
         $data = ['data' => $detail];
         // return view('bibit/order/download', $data);
         $pdf = PDF::loadView('bibit/order/download', $data);
         
         return $pdf->download('Order-'.$detail['data']['pemohon'][0]['nama_pemohon'].'-'.$detail['data']['order'][0]['id'].'.pdf');
      }
      
      return redirect('/');
         
   }

   public function map($ltlg)
   {
         
      
         
   }
         
   // 
   // 
   // Order End
   // 
   // 
}
