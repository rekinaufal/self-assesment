<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// class CalculationForm1 implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping, WithStartRow
class CalculationForm1 implements WithTitle, FromView, WithStyles, ShouldAutoSize, WithColumnFormatting
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
        return 'Form 1.1';
    }

    public function styles(Worksheet $sheet)
    {
        // FORMULIR 1.1 : TINGKAT KOMPONEN DALAM NEGERI UNTUK BAHAN BAKU (BAHAN BAKU LANGSUNG / TIDAK LANGSUNG)
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
        $sheet->mergeCells('H9:H10');
        $sheet->mergeCells('I9:I10');
        $sheet->mergeCells('J9:L9');
        $sheet->mergeCells('N9:Q9');

        // wrap text header detail
        $sheet->getStyle('D9:D10')->getAlignment()->setWrapText(true);
        $sheet->getStyle('H9:H10')->getAlignment()->setWrapText(true);

        // font size header detail
        $sheet->getStyle('A9:J9')->getFont()->setSize(8);
        $sheet->getStyle('A10:J10')->getFont()->setSize(8);

        $sheet->getStyle('A9:Q10')->getAlignment()->setHorizontal('center')->setVertical('middle');
        // $sheet->getStyle('J9')->getAlignment()->setHorizontal('center')->setVertical('middle');

        // border header detail
        $sheet->getStyle('A9:Q9')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A10:Q10')->getBorders()->getAllBorders()->setBorderStyle('thin');

        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('A11:A' . $lastRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D11:D' . $lastRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('G11:G' . $lastRow)->getAlignment()->setHorizontal('right');
        $sheet->getStyle('I11:Q' . $lastRow)->getAlignment()->setHorizontal('left');
    }

    public function view(): View
    {
        return view('excel.calculation-form1', [
            'parent' => $this->parent_row,
            'detail' => $this->rows
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'J' => 'Rp #,##0.00',
            'K' => 'Rp #,##0.00',
            'L' => 'Rp #,##0.00',
            'M' => 'Rp #,##0.00',
            'N' => 'Rp #,##0.00',
            'O' => 'Rp #,##0.00',
            'P' => 'Rp #,##0.00',
            'Q' => 'Rp #,##0.00',
        ];
    }
    // public function query()
    // {
    //     return User::query()
    //                 ->select('email', 'created_at');
    // }

    // public function headings(): array
    // {
    //     return [
    //         'email',
    //         'created at',
    //     ];
    // }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class    => function(AfterSheet $event) {
    //             $cellRange = 'A1:C1'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //         },
    //     ];
    // }
}
