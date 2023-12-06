<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CalculationForm4 implements WithTitle, FromView, WithStyles, ShouldAutoSize
{
    protected $rows;
    protected $parent_row;

    public function __construct(array $rows, $parent_row)
    {
        $this->parent_row = $parent_row;
        $this->rows = $rows;
        // dd($this->rows);
    }

    public function title(): string
    {
        return 'Form 1.4';
    }

    public function view(): View
    {
        return view('excel.calculation-form4', [
            
            'parent' => $this->parent_row,
            'detail' => $this->rows
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // FORMULIR 1.4 : TINGKAT KOMPONEN DALAM NEGERI UNTUK TENAGA KERJA LANGSUNG (UNTUK BIAYA TERKAIT LAINNYA)											
        $sheet->mergeCells('A1:L1');

                // merge header parent
                $sheet->mergeCells('A3:B3');
                $sheet->mergeCells('A4:B4');
                $sheet->mergeCells('A5:B5');
                $sheet->mergeCells('A6:B6');
                $sheet->mergeCells('A7:B7');
                
                // merge header detail
                $sheet->mergeCells('A9:A10');
                $sheet->mergeCells('B9:B10');
                $sheet->mergeCells('C9:C10');
                $sheet->mergeCells('D9:D10');
                $sheet->mergeCells('E9:E10');
                $sheet->mergeCells('F9:F10');
                $sheet->mergeCells('G9:G10');
        
                $sheet->mergeCells('H9:J9');
                $sheet->getStyle('A9:J10')->getAlignment()->setHorizontal('center')->setVertical('middle');
                
                // font size header detail
                $sheet->getStyle('A9:Q9')->getFont()->setSize(8);
                $sheet->getStyle('A10:Q10')->getFont()->setSize(8);
        
                // border header detail
                $sheet->getStyle('A9:J9')->getBorders()->getAllBorders()->setBorderStyle('thin');
                $sheet->getStyle('A10:J10')->getBorders()->getAllBorders()->setBorderStyle('thin');
    }
    // public function map($row): array
    // {
    //     // dd($this->rows);
    //     return [
    //         $row["uraian_posisi"],
    //         $row["produsen_tingkat_dua"],
    //         $row["tkdn"],
    //         $row["jumlah_orang"],
    //         $row["biaya_pengurusan_per_bulan"],
    //         $row["alokasi"],
    //         $row["id"],
    //         $row["kdn"],
    //         $row["kln"],
    //         $row["total"],
    //         $row["sumJumlahOrang"],
    //         $row["sumKdn"],
    //         $row["sumKln"],
    //         $row["sumTotal"],
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         "uraian_posisi",
    //         "produsen_tingkat_dua",
    //         "tkdn",
    //         "jumlah_orang",
    //         "biaya_pengurusan_per_bulan",
    //         "alokasi",
    //         "id",
    //         "kdn",
    //         "kln",
    //         "total",
    //         "sumJumlahOrang",
    //         "sumKdn",
    //         "sumKln",
    //         "sumTotal",
    //     ];
    // }

    // public function array(): array
    // {
    //     return $this->rows;
    // }

    // public function columnFormats(): array
    // {
    //     return [
    //         'B' => '#,##0',
    //         'C' => '#,##0',
    //         'D' => '#,##0',
    //         'E' => '#,##0',
    //         'F' => '#,##0',
    //         'G' => '#,##0',
    //         'H' => '#,##0',
    //         'I' => '#,##0',
    //         'J' => '#,##0',
    //         'K' => '#,##0',
    //         'L' => '#,##0',
    //     ];
    // }
}
