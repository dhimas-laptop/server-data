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
        $user = user::select('*')
                ->from('users')
                ->get();
        
        return view('users', ['user' => $user]);
    }

    public function tambah(Request $request)
    {
        $cek = user::get('id');

        $id = count($cek);

        user::insert([
            'id' => $id+1,
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->password,
            'no_telp' => $request->no_telp

        ]);
        return redirect()->action([UserController::class, 'index']);;
    }
    
    public function update($id)
    {
        $user = user::findOrFail($id);
       

        return view('/users/update',['user' => $user]);

    }
    public function update_proses(Request $request)
    {
        
       user::where('id', $request->id)
            ->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->password,
            'no_telp' => $request->no_telp
            ]);
            
        return redirect()->action([UserController::class, 'index']);

    }

    public function hapus($id)
    {
        user::select('*')->where('id', $id)->delete();
                
        return redirect()->action([UserController::class, 'index']);
    }

}