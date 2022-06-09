<?php

namespace App\Exports;

use App\Models\spd;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SpdExport implements FromView
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

    public function view(): View
    {
        $query = spd::whereYear('tgl_spt', $this->year)->whereMonth('tgl_spt',$this->month)->get();
        return view('report.spd', [
            'spd' => $query
        ]);
    }

}
