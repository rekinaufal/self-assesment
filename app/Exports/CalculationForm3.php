<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CalculationForm3 implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;
    protected $parent_rows;

    public function __construct(array $rows, array $parent_rows)
    {
        $this->parent_rows = $parent_rows;
        $this->rows = $rows;
        // dd($this->rows);
    }

    public function title(): string
    {
        return 'Form 1.3';
    }

    public function map($row): array
    {
        // dd($this->rows);
        return [
            $row["uraian_posisi"],
            $row["kewarganegaraan"],
            $row["tkdn"],
            $row["jumlah_orang"],
            $row["gaji_perbulan"],
            $row["alokasi_gaji"],
            $row["bpjs_percent"],
            $row["currency_tunjangan_lainnya"],
            $row["id"],
            $row["kdn"],
            $row["kln"],
            $row["total"],
            $row["bpjs"],
            $row["tunjangan_lainnya"],
            $row["sumJumlahOrang"],
            $row["sumKdn"],
            $row["sumKln"],
            $row["sumTotal"],
            $row["sumBpjs"],
            $row["sumTunjanganLainnya"],
        ];
    }

    public function headings(): array
    {
        return [
            "uraian_posisi",
            "kewarganegaraan",
            "tkdn",
            "jumlah_orang",
            "gaji_perbulan",
            "alokasi_gaji",
            "bpjs_percent",
            "currency_tunjangan_lainnya",
            "id",
            "kdn",
            "kln",
            "total",
            "bpjs",
            "tunjangan_lainnya",
            "sumJumlahOrang",
            "sumKdn",
            "sumKln",
            "sumTotal",
            "sumBpjs",
            "sumTunjanganLainnya",
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
}