<?php

namespace App\Http\Controllers;

use App\Models\spd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatriksController extends Controller
{
   public function index()
   {
    if (!auth()->check()) {
        return redirect()->action('login');
    }
    
    return view('matriks.index',['active' => 'matriks']);

   }

   public function event()
   {
      if (!auth()->check()) {
         $auth = Auth::user()->id;
      if (Auth::user()->role === "admin") {
         $data = spd::get();
      } else {
         $data = spd::where('user_id', $auth)->get();
      }
      
      foreach ($data as $key) {
         $title[] = $key->user->name;
         $start[] = $key->berangkat;
         $end[] = $key->pulang; 
      }
      $count = count($data);
      for ($i=0; $i < $count ; $i++) { 
         $response[] = [
               'title' => $title[$i],
               'start' => $start[$i],
               'end' => $end[$i],
               'backgroundColor' => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6)
               
            ];   
      }
      return response()->json($response);
      
     }
     
     return view('matriks.index',['active' => 'matriks']);
      
   }
}
