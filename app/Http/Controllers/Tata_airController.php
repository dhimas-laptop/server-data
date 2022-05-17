<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class Tata_airController extends Controller
{
    public function curah_hujan()
    {
        if (Gate::check('admin')||Gate::check('ev')) {
            return view('/tata_air/curah_hujan', ['active' => 'curah_hujan']);
        }
        return redirect('/');
    }

    public function tma()
    {
        if (Gate::check('admin')||Gate::check('ev')) {
            return view('/tata_air/tma', ['active' => 'tma']);
        }
        return redirect('/');
    }

    public function debit_air()
    {
        if (Gate::check('admin')||Gate::check('ev')) {
            return view('/tata_air/debit_air', ['active' => 'debit_air']);
        }
        return redirect('/');
    }

    public function grafik()
    {
        if (Gate::check('admin')||Gate::check('ev')) {
            return view('/tata_air/grafik', ['active' => 'grafik']);
        }
        return redirect('/');
    }

}
