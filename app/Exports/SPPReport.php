<?php
namespace App\Exports;
use App\SPP;
​
use Maatwebsite\Excel\Concerns\FromCollection;
​
class SPPReport implements FromCollection
{
    public function collection()
    {
        return SPP::all();
    }
}