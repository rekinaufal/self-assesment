<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CalculationForm9 implements WithTitle, FromView, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    protected $rows;
    protected $parent_row;

    public function __construct(array $rows, $parent_row)
    // public function __construct($parent_row)
    {
        $this->parent_row = $parent_row;
        $this->rows = $rows;
        // dd($this->rows);
    }

    public function title(): string
    {
        return 'Form 1.9';
    }

    public function view(): View
    {
        return view('excel.calculation-form9', [

            'parent' => $this->parent_row,
            'detail' => $this->rows
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // FORMULIR 1.9 : REKAPITULASI PENILAIAN
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center')->setVertical('middle');
        // TINGKAT KOMPONEN DALAM NEGERI RANGKA, DAN/ATAU BODI
        $sheet->mergeCells('A2:F2');
        $sheet->getStyle('A2:F2')->getAlignment()->setHorizontal('center')->setVertical('middle');

        // merge header parent
        $sheet->mergeCells('A4:B4');
        $sheet->mergeCells('A5:B5');
        $sheet->mergeCells('A6:B6');
        $sheet->mergeCells('A7:B7');
        $sheet->mergeCells('A8:B8');

        // merge header detail
        $sheet->mergeCells('A10:B11');
        $sheet->mergeCells('C10:E10');
        $sheet->mergeCells('F10:F11');

        // merge garis abu
        $sheet->mergeCells('A12:F12');
        $sheet->mergeCells('A15:F15');
        $sheet->mergeCells('A18:F18');

        // merge total
        $sheet->mergeCells('A23:B23');

        // border header detail
        $sheet->getStyle('A10:F10')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A11:F11')->getBorders()->getAllBorders()->setBorderStyle('thin');

        // outside borders
        $sheet->getStyle('A4:F4')->getBorders()->getTop()->setBorderStyle('thin');
        $sheet->getStyle('F4:F23')->getBorders()->getRight()->setBorderStyle('thin');

        $sheet->getStyle('A10:F11')->getAlignment()->setHorizontal('center')->setVertical('middle');

        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('C13:E' . $lastRow)->getAlignment()->setHorizontal('left');
        $sheet->getStyle('F13:F' . $lastRow)->getAlignment()->setHorizontal('right');
    }

    public function columnFormats(): array
    {
        return [
            'C' => 'Rp #,##0.00',
            'D' => 'Rp #,##0.00',
            'E' => 'Rp #,##0.00',
        ];
    }
}
