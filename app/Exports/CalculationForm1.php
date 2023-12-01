<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CalculationForm1 implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;
    
    public function __construct(array $rows)
    {
        $this->rows = $rows;
        // dd($this->rows);
    }
    
    public function title(): string
    {
        return 'Form 1.1';
    }

    public function map($row): array
    {
        // dd($row['bahan_baku']);
        return [
            $row['bahan_baku'],
            $row['spesifikasi'],
            $row['satuan_bahan_baku'],
            $row['negara_asal'],
            $row['pemasok'],
            $row['tkdn'],
            $row['jumlah'],
            $row['harga_satuan'],
            $row['ppn'],
            $row['bm'],
            $row['pdri_ppn'],
            $row['pph'],
        ];
    }

    public function headings(): array
    {
        return [
            'bahan_baku',
            'spesifikasi',
            'satuan_bahan_baku',
            'negara_asal',
            'pemasok',
            'tkdn',
            'jumlah',
            'harga_satuan',
            'ppn',
            'bm',
            'pdri_ppn',
            'pph',
        ];
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function columnFormats(): array
    {
        return [
            'B' => '#,##0',
            'C' => '#,##0',
            'D' => '#,##0',
            'E' => '#,##0',
            'F' => '#,##0',
            'G' => '#,##0',
            'H' => '#,##0',
            'I' => '#,##0',
            'J' => '#,##0',
            'K' => '#,##0',
            'L' => '#,##0',
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
