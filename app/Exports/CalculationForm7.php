<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CalculationForm7 implements WithTitle, FromView, WithStyles, ShouldAutoSize
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
        return 'Form 1.7';
    }

    public function view(): View
    {
        return view('excel.calculation-form7', [
            
            'parent' => $this->parent_row,
            'detail' => $this->rows
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // FORMULIR 1. 7 : TINGKAT KOMPONEN DALAM NEGERI UNTUK BIAYA TIDAK LANGSUNG PABRIK (UNTUK MESIN / ALAT KERJA / FASILITAS KERJA YANG DISEWA													
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
        $sheet->mergeCells('F9:H9');
        $sheet->mergeCells('I9:I10');
        $sheet->mergeCells('J9:J10');
        $sheet->mergeCells('K9:M9');

        // $sheet->mergeCells('H9:J9');
        $sheet->getStyle('A9:M10')->getAlignment()->setHorizontal('center')->setVertical('middle');
        
        // font size header detail
        $sheet->getStyle('A9:Q9')->getFont()->setSize(8);
        $sheet->getStyle('A10:Q10')->getFont()->setSize(8);

        // border header detail
        $sheet->getStyle('A9:M9')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A10:M10')->getBorders()->getAllBorders()->setBorderStyle('thin');
    }
    // public function map($row): array
    // {
    //     // dd($this->rows);
    //     return [
    //         $row["uraian"],
    //         $row["spesifikasi"],
    //         $row["produsen_tingkat_dua"],
    //         $row["jumlah_unit"],
    //         $row["biaya_sewa_perbulan"],
    //         $row["alokasi"],
    //         $row["dibuat"],
    //         $row["dimiliki"],
    //         $row["tkdn"],
    //         $row["id"],
    //         $row["kdn"],
    //         $row["kln"],
    //         $row["total"],
    //         $row["sumJumlahUnit"],
    //         $row["sumKdn"],
    //         $row["sumKln"],
    //         $row["sumTotal"],
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         "uraian",
    //         "spesifikasi",
    //         "produsen_tingkat_dua",
    //         "jumlah_unit",
    //         "biaya_sewa_perbulan",
    //         "alokasi",
    //         "dibuat",
    //         "dimiliki",
    //         "tkdn",
    //         "id",
    //         "kdn",
    //         "kln",
    //         "total",
    //         "sumJumlahUnit",
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
