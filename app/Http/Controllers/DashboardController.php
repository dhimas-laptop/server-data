<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) { //checking authorization

        return view('dashboard', ['active' => "dashboard"]);
        
        }else {
           redirect('/login');
       }
    }
    
}
