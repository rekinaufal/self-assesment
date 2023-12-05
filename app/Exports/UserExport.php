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
    protected $parent_data;
    protected $sheets;
    public function __construct(array $sheets, $parent_data)
    {
        $this->parent_data = $parent_data;
        $this->sheets = $sheets;
    }

    public function array(): array
    {
        return $this->sheets;
    }

    public function sheets(): array
    {
        // dd($this);
        $sheets = [
            new CalculationForm1($this->sheets['1.1'], $this->parent_data),
            new CalculationForm2($this->sheets['1.2'], $this->parent_data),
            new CalculationForm3($this->sheets['1.3'], $this->parent_data),
            new CalculationForm4($this->sheets['1.4'], $this->parent_data),
            new CalculationForm5($this->sheets['1.5'], $this->parent_data),
            new CalculationForm6($this->sheets['1.6'], $this->parent_data),
            new CalculationForm7($this->sheets['1.7'], $this->parent_data),
            new CalculationForm8($this->sheets['1.8'], $this->parent_data),
            // new CalculationForm9($this->sheets['1.9'], $this->parent_data),
            new CalculationForm9($this->parent_data),
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
