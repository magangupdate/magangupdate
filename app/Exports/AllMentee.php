<?php

namespace App\Exports;

use App\Models\Mentee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AllMentee implements FromCollection, WithHeadings, WithTitle
{
    private $classID;
    private $title;
    
    public function __construct($classID, $title)
    {
        $this->classID = $classID;
        $this->title = $title;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mentee::where('first_class', $this->classID)->orWhere('second_class' $this->classID)->select('menteeID', 'full_name', 'university', 'major', 'email', 'whatsapp_number', 'instagram')->orderBy('full_name', 'asc')->get();
    }
    
    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Universitas',
            'Jurusan',
            'Email',
            'Whatsapp',
            'Instagram',
        ];
    }
    
    public function title(): string
    {
        return $this->title;
    }
}
