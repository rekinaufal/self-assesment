<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class UserExport implements FromArray, WithMultipleSheets 
{
    protected $sheets;
    public function __construct(array $sheets)
    {
        $this->sheets = $sheets;
    }

    public function array(): array
    {
        return $this->sheets;
    }

    public function sheets(): array
    {
        // dd($this->sheets['1.1']);
        $sheets = [
            new CalculationForm1($this->sheets['1.1']),
            new CalculationForm2($this->sheets['1.2']),
            // new CalculationForm3($this->sheets['1.3']),
            // new CalculationForm4($this->sheets['1.4']),
            // new CalculationForm5($this->sheets['1.5']),
            // new CalculationForm6($this->sheets['1.6']),
            // new CalculationForm7($this->sheets['1.7']),
            // new CalculationForm8($this->sheets['1.8']),
            // new CalculationForm9($this->sheets['1.9']),
        ];

        return $sheets;
    }
    // public function sheets(): array 
    // {   
    //     return [
    //         new CalculationForm1(),
    //         new CalculationForm2(),
    //     ];
    // }
}
