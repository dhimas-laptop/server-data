<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\models\User;

use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
           return redirect()->action('login');
        }
        $user = user::select('*')
                ->from('users')
                ->get();
        
        return view('users', ['user' => $user , 'active' => "pengguna"]);
    }

    public function tambah(Request $request)
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
        user::create($validate);

        return redirect()->action([UserController::class, 'index']);;
    }
    
    public function update($id)
    {
        $user = user::findOrFail($id);
       

        return view('/users/update',['user' => $user ,  'active' => "pengguna"]);

    }
    public function update_proses(Request $request)
    {
        
        $validate = $request->validate([
            'name' => 'required',
            'nip' => 'required|min:18',
            'email' => 'required|email',
            'password' => 'required|min:6|alpha_num',
            'no_telp' => 'required',
            'role' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        user::where('id' , $request->id)->update($validate);
            
        return redirect()->action([UserController::class, 'index']);

    }

    public function hapus($id)
    {
        user::select('*')->where('id', $id)->delete();
                
        return redirect()->action([UserController::class, 'index']);
    }

}
