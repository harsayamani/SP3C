<?php
namespace App\Exports;
use App\PSB;
​
use Maatwebsite\Excel\Concerns\FromCollection;
​
class PSBReport implements FromCollection
{
    public function collection()
    {
        return PSB::all();
    }
}