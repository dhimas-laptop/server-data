<?php

namespace App\Http\Controllers;

use App\Models\spd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatriksController extends Controller
{
   public function index()
   {
    // if (!auth()->check()) {
    //     return redirect()->action('login');
    // }
    // $auth = Auth::user()->id;

    // $berangkat = spd::select()
    //     ->where('user_id' , $auth)
    //     ->get('berangkat');

    // $pulang = spd::select()
    //     ->where('user_id' , $auth)
    //     ->get('pulang');

    return view('matriks.index',['active' => 'matriks']);

   }
}
