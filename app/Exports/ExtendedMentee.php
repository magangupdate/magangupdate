<?php

namespace App\Exports;

use App\Models\Mentee;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExtendedMentee implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mentee::all();
    }
}
