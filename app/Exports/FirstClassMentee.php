<?php

namespace App\Exports;

use App\Models\Mentee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class FirstClassMentee implements FromCollection, WithHeadings, WithTitle
{
    protected $classID;
    protected $title;
    
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
        return Mentee::where('first_class', $this->classID)->select('menteeID', 'full_name', 'university', 'major', 'email', 'whatsapp_number', 'instagram')->orderBy('total_score', 'desc')->get();
    }
    
    public function headings(): array
    {
        return [
            'ID',
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
