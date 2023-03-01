<?php

namespace App\Exports;

use App\Models\spd;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpdExport implements FromView, ShouldAutoSize, WithStyles, WithEvents, WithColumnWidths
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

    public function columnWidths(): array
    {
        return [
            'A' => 11,
            'B' => 16,
            'C' => 35,
            'D' => 20,
            'E' => 13,
            'F' => 11,
            'G' => 11,
            'H' => 11,
            'I' => 20,
            'J' => 13,
            'K' => 20,
            'L' => 10,
            'M' => 11,
            'N' => 11,
            'O' => 20,
            'P' => 11,
            'Q' => 16,
            'R' => 16,
            'S' => 11,           
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A' => ['alignment' => ['wrapText' => true]],
            'B' => ['alignment' => ['wrapText' => true]],
            'C' => ['alignment' => ['wrapText' => true]],
            'D' => ['alignment' => ['wrapText' => true]],
            'E' => ['alignment' => ['wrapText' => true]],
            'F' => ['alignment' => ['wrapText' => true]],
            'G' => ['alignment' => ['wrapText' => true]],
            'H' => ['alignment' => ['wrapText' => true]],
            'I' => ['alignment' => ['wrapText' => true]],
            'J' => ['alignment' => ['wrapText' => true]],
            'K' => ['alignment' => ['wrapText' => true]],
            'L' => ['alignment' => ['wrapText' => true]],
            'M' => ['alignment' => ['wrapText' => true]],
            'N' => ['alignment' => ['wrapText' => true]],
            'O' => ['alignment' => ['wrapText' => true]],
            'P' => ['alignment' => ['wrapText' => true]],
            'Q' => ['alignment' => ['wrapText' => true]],
            'R' => ['alignment' => ['wrapText' => true]],
            'S' => ['alignment' => ['wrapText' => true]],        
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
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
            'spd' => $query  
         ]);
    }

}
