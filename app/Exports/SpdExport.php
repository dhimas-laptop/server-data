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

class SpdExport implements FromView, ShouldAutoSize, WithStyles, WithEvents, WithColumnWidths, WithColumnFormatting
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
            'A' => 5,
            'B' => 11,
            'C' => 16,
            'D' => 35,
            'E' => 20,
            'F' => 13,
            'G' => 12,
            'H' => 12,
            'I' => 15,
            'J' => 20,
            'K' => 13,
            'L' => 20,
            'M' => 10,
            'N' => 15,
            'O' => 15,
            'P' => 20,
            'Q' => 15,
            'R' => 16,
            'S' => 16,
            'T' => 15,           
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_TEXT,
            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT,
            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getPageMargins()->setTop(1);
        $sheet->getPageMargins()->setRight(0);
        $sheet->getPageMargins()->setLeft(0);
        $sheet->getPageMargins()->setBottom(1);
        
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
            'T' => ['alignment' => ['wrapText' => true]],        
        ];
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
