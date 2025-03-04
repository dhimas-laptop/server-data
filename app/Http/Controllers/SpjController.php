<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user; 
use App\Models\ttd;

class SpjController extends Controller
{
    public function penandatangan()
    {
        $data = ttd::get();
        return $data;
        return view('spj/ttd',['active' => 'ttd', 'dataTTD' => 'data'], compact('user'));
    }
    
    public function input_data()
    {
        $user = user::get();
        return view('spj/input',['active' => 'input'], compact('user'));
    }

}
