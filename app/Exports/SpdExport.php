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
    public function view(): View
    {
            $query = spd::get();
        
        return view('report.spd', [
            'spd' => $query , 'no' => 1 
         ]);
    }

}
