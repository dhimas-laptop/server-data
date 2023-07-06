<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user; 

class SpjController extends Controller
{
    public function drpp_index()
    {
        $user = user::get();
        return view('spj/drpp',['active' => 'SPJ'], compact('user'));
    }
}
