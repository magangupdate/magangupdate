<?php

namespace App\Exports;

use App\Models\Mentee;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MenteesExport implements WithMultipleSheets
{
    use Exportable;
    
    protected $classID;
    
    public function __construct($classID)
    {
        $this->classID = $classID;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Mentee::where('first_class', $this->classID)->select('menteeID', 'full_name', 'university', 'major', 'email', 'whatsapp_number', 'instagram')->orderBy('total_score', 'desc')->limit(25)->get();
    // }
    
    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Nama',
    //         'Universitas',
    //         'Jurusan',
    //         'Email',
    //         'Whatsapp',
    //         'Instagram',
    //     ];
    // }
    
    public function sheets(): array 
    {
        $sheetsTitle = ["25 Mentee Yang Lulus", "Pilihan Pertama", "Pilihan Kedua"];
        $sheets = [];
        // $sheets[0] = new AllMentee($this->classID, $sheetsTitle[0]);
        $sheets[0] = new GraduatedMenteeSheet($this->classID, $sheetsTitle[0]);
        $sheets[1] = new FirstClassMentee($this->classID, $sheetsTitle[1]);
        $sheets[2] = new SecondClassMentee($this->classID, $sheetsTitle[2]);
        
        return $sheets;
    }
}
