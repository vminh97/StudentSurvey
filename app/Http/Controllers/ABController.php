<?php

namespace App\Http\Controllers;
use App\survey;use App\stterm;
use App\question;use App\teterm;
use App\branch;use App\theme;
use App\kssvo;
use App\faculty_tables;
use App\subject;use App\kssvt;
use App\teacher;use App\kste;
use App\student;use App\ksalum;
use App\term;use App\company;
use App\classer;use App\personcompany;
use App\kscompany;
use App\alummi;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Exports\KsalumExport;
use Maatwebsite\Excel\Facades\Excel;
class ABController extends Controller
{
    
    public function getLista()
    {
        $list = DB::table('ksalum')
        ->join('survey','ksalum.id_survey','=','survey.id')
        ->join('alummi','ksalum.id_alummi','=','alummi.id')
        ->join('question','ksalum.id_question','=','question.id')
        ->select('ksalum.*','NameSurvey','NameQuestion','NameAlummi')
        ->get();
          return view('backend.ksalum.list',compact('list'));

    }
    public function getListb()
    {
        $list = DB::table('kssvt')  
        ->join('survey','kssvt.id_survey','=','survey.id')
        ->join('student','kssvt.id_student','=','student.id')
        ->join('question','kssvt.id_question','=','question.id')
        ->select('kssvt.*','NameSurvey','NameQuestion','NameStudent')
        ->get();
      //   dd('list');
          return view('backend.ksstv.list',compact('list'));
    }
    public function getListc()
    {
        $list = DB::table('kste')  
        ->join('survey','kste.id_survey','=','survey.id')
        ->join('teacher','kste.id_teacher','=','teacher.id')
        ->join('question','kste.id_question','=','question.id')
        ->select('kste.*','NameSurvey','NameQuestion','NameTeacher')
        ->get();
      //   dd('list');
          return view('backend.kste.list',compact('list'));
    }
    public function getListd()
    {
        $list = DB::table('kscompany')  
        ->join('survey','kscompany.id_survey','=','survey.id')
        ->join('personcompany','kscompany.id_personcom','=','personcompany.id')
        ->join('question','kscompany.id_question','=','question.id')
        ->select('kscompany.*','NameSurvey','NameQuestion','Name')
        ->get();
      //   dd('list');
          return view('backend.kscompany.list',compact('list'));
    }
    public function getListe()
    {
        $list = DB::table('kssvo')  
        ->join('survey','kssvo.id_survey','=','survey.id')
        ->join('stterm','kssvo.id_stterm','=','stterm.id')
        ->join('question','kssvo.id_question','=','question.id')
        ->join('teacher','kssvo.id_teacher','=','teacher.id')
        ->join('class','kssvo.id_class','=','class.id')
        ->select('kssvo.*','NameSurvey','NameQuestion','NameStudent','NameTeacher','NameClass')
        ->get();
      //   dd('list');
          return view('backend.kssvhp.list',compact('list'));
    }
    public function getdado()
    {
        $price = DB::table('student')->select('id','NameStudent','Phone')->orderby('id','Desc')->limit(5)->get();
        $topgv = DB::table('teterm')->select('id','NameTeacher','Phone')->orderby('id','Desc')->limit(5)->get();
        $topcsv = DB::table('alummi')->select('id','NameAlummi','Phone')->orderby('id','Desc')->limit(5)->get();


        $student = DB::table('student')->count('id');
        $alummi = DB::table('alummi')->count('id');
        $teacher = DB::table('teacher')->count('id');
        $theme = DB::table('theme')->count('id');
        $survey = DB::table('survey')->count('id');
        $question = DB::table('question')->count('id');
        // dd($price);
        return view('backend.Darddord',compact('student','teacher','alummi','theme','survey','question','price','topgv','topcsv'));
    } 
    // public function export()
    // {
    //     return Excel::download(new KsalumExport,'ksalum.xlsx');
    // }
    

     

}
