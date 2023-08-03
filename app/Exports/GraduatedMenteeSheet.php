<?php

namespace App\Exports;

use App\Models\Mentee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class GraduatedMenteeSheet implements FromCollection, WithHeadings, WithTitle
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
        // $mentees = Mentee::where('first_class', $this->classID)->select('total_score', 'full_name', 'university', 'major', 'email', 'whatsapp_number', 'instagram')->orderBy('total_score', 'desc')->limit(25)->get();
        // $menteeMap = $mentees->map(function($mentee, $key) {
        //     $whatsappNumber = "";
        //     if(substr($mentee->whatsapp_number, 0, 2) == '08') {
        //         $whatsappNumber = str_replace(substr($mentee->whatsapp_number, 0, 2), '628');
        //     } else {
        //         $whatsappNumber = "'" . $mentee->whatsapp_number;
        //     }
        //     return [
        //       "total_score" => $mentee->total_score,
        //       "full_name" => $mentee->full_name,
        //       "university" => $mentee->university,
        //       "major" => $mentee->major,
        //       "email" => $mentee->email,
        //       "whatsapp_number" => "wa.me/" . $whatsappNumber,
        //       "instagram" => "instagram.com/" . $mentee->instagram
        //     ];
        // });
        // dd($menteeMap);
        // return $menteeMap;
        return Mentee::where('first_class', $this->classID)->select('total_score', 'full_name', 'university', 'major', 'email', 'whatsapp_number', 'instagram')->orderBy('total_score', 'desc')->limit(25)->get();
    }
    
    public function headings(): array
    {
        return [
            'Score',
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
