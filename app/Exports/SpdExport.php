<?php

namespace App\Exports;

use App\Models\spd;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SpdExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public function forYear(int $year)
    {
        $this->year = $year;
        return $this;
    }

    public function forMonth(int $month)
    {
        $this->month = $month;
        return $this;
    }

    public function forUser(int $user)
    {
        $this->user = $user;
        return $this;
    }

    public function forRole($role)
    {
        $this->role= $role;
        return $this;
    }

    public function view(): View
    {
        if ($this->role === 'admin' || $this->role === 'tu') {
            $query = spd::whereYear('tgl_spt', $this->year)->whereMonth('tgl_spt',$this->month)->orderBy('tgl_spt', 'ASC')->get();
        } else {
            $query = spd::whereYear('tgl_spt', $this->year)->whereMonth('tgl_spt',$this->month)->orderBy('tgl_spt', 'ASC')->where('user_id', $this->user)->get();
        }
        
        return view('report.spd', [
            'spd' => $query , 'month'=> $this->month , 'year' => $this->year 
         ]);
    }

}
