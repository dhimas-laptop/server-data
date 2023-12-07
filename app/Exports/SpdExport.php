<?php

namespace App\Exports;

use App\Models\spd;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpdExport implements FromView, ShouldAutoSize, WithEvents
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
    
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->sheet->getPageSetup()->setFitToWidth(1);
                $event->sheet->getPageSetup()->setFitToHeight(0);
            },
            
        ];
    }

    public function view(): View
    {
        if ($this->role === 'admin') {
            $query = spd::get();
        } else {
            $query = spd::where('nomor_spt', $this->no)->orderBy('tgl_spt', 'ASC')->get();
        }
        
        return view('report.spd', [
            'spd' => $query , 'no' => 1 
         ]);
    }

}
