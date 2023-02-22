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
    public function forYear($no)
    {
        $this->no = $no;
        return $this;
    }
    public function forRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function view(): View
    {
        if ($this->role === 'admin') {
            $query = spd::get();
        } else {
            $query = spd::where('nomor_spt', $this->no)->orderBy('tgl_spt', 'ASC')->get();
        }
        
        return view('report.spd', [
            'spd' => $query  
         ]);
    }

}
