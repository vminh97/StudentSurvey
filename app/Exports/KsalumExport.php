<?php

namespace App\Exports;

use App\ksalum;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class KsalumExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ksalum::select('ksalum.*','NameSurvey','NameQuestion','NameAlummi')
        ->join('survey','ksalum.id_survey','=','survey.id')
        ->join('alummi','ksalum.id_alummi','=','alummi.id')
        ->join('question','ksalum.id_question','=','question.id')
        ->get();
    }
    public function headings(): array{
        return[
            'id',
            'NameServey',
            'NameAlummi',
            'NameQuestion',
            'answer'
        ];
    }
}
