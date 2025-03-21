<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

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
      if (Auth::check()) {
         $response = Http::get('https://bibit.bpdas-sjd.id/API/bibit');
         $detail = json_decode($response,true);
        
         return view('/bibit/bibit/bibit', ['data' => $detail , 'active' => 'data-bibit', 'no' => 1]);
      }else {
         redirect('/login');
     }
         
     
   }

   public function tambah(Request $request)
   {
      if (Auth::check()) {
      $validator = $request->validate([
         'nama' => 'required',
         'jenis' => 'required',
         'total' => 'required',
         'file' => 'image|required'
      ],[
         'required' => 'Ada kolom yang belum terisi</br>'
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
         
         }else {
            redirect('/login');
        }

   }

   public function hapus($id)
   {
      if (Auth::check()) {

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
         }else {
            redirect('/login');
        }
   }

   // 
   // 
   // order start
   // 
   // 

   public function order()
   {
      if (Auth::check()) {
      
         $response = Http::get('https://bibit.bpdas-sjd.id/API/order');
         $detail = json_decode($response,true);
         return view('/bibit/order/order', ['data' => $detail , 'active' => 'data-order', 'no' => 1]);
         
      }else {
         redirect('/login');
      }
           
   }

   public function proses($id)
   {
      if (Auth::check()) { //checking authorization
      
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
         
      }else {
         redirect('/login');
      }
         
   }
   
   public function selesai($id)
   {
      if (Auth::check()) { //checking authorization
      
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
   
      }else {
         redirect('/login');
      }
   
   }

   public function tolak($id)
   {
      if (Auth::check()) { //checking authorization
      
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
         
         }else {
            redirect('/login');
        }
         
   }

   public function hapus_order($id)
   {
      if (Auth::check()) { //checking authorization

         $response = Http::post('https://bibit.bpdas-sjd.id/API/order/hapus', [
               'id' => $id,
         ]);
         $responseresult = json_decode($response->getBody()->getContents(), true);
         if ($responseresult['status'] == true) {
            return redirect('/data-order')->with(['success' => $responseresult['message']]);
         } else {     
            return redirect('/data-order')->with(['error' => $responseresult['message']]);
         }
         
      }else {
         redirect('/login');
      }  
         
   }

   public function download_order($id)
   {
      if (Auth::check()) { //checking authorization

         $response = Http::get('https://bibit.bpdas-sjd.id/API/order-filter', [
            'id' => $id
         ]);
         
         $detail = json_decode($response,true);
         $data = ['data' => $detail];
         return view('bibit/order/download', $data);
         // $pdf = PDF::loadView('bibit/order/download', $data);
         
         // return $pdf->set_option('isRemoteEnabled',true)->download('Order-'.$detail['data']['pemohon'][0]['nama_pemohon'].'-'.$detail['data']['order'][0]['id'].'.pdf');
      
      }else {
         redirect('/login');
     }
         
   }

   public function view($id)
   {
      $response = Http::get('https://bibit.bpdas-sjd.id/API/order-filter', [
         'id' => $id
      ]);
      
      $detail = json_decode($response,true);
      $data = ['data' => $detail];

     return view('bibit/order/show', $data);           
   }
         
   // 
   // 
   // Order End
   // 
   // 
   public function test()
   {
      if (Auth::check()) {
      
         $response = Http::get('https://bibit.bpdas-sjd.id/API/order');
         $detail = json_decode($response,true);
         return $detail;
         
      }else {
         redirect('/login');
      }
           
   }
}

   
