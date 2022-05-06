<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index()
   {
       return view('login');
   }

   public function login(Request $request)
   {

    $validate = $request->validate([
        'nip' => 'required',
        'password' => 'required|min:6'
    ]);

    if (Auth::attempt($validate))
    {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->with('error','Data tidak Ada');

   }

   public function register()
   {
       return view('register');
   }

   public function register_proses(Request $request)
   {
       $validate = $request->validate([
        'name' => 'required',
        'nip' => 'required|min:18|unique:users,nip',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|alpha_num',
        'no_telp' => 'required',
        'role' => 'required'
       ]);
       
       $validate['password'] = bcrypt($validate['password']);
       User::create($validate);

       return redirect()->action([LoginController::class , 'index']);
   }

   public function logout(Request $request)
   {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
   }
}
