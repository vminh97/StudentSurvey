<?php

namespace App\Http\Controllers;
use App\survey;
use App\question;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class QuestionController extends Controller
{
    public function getList()
    {
        $list = DB::table('question') 
        ->join('survey','question.id_survey','=','survey.id')
        ->join('theme','survey.id_theme','=','theme.id')
        ->select('question.*','NameSurvey','NameTheme')
        ->get();
        // //
          return view('backend.question.list',compact('list'));

    }
    public function getAdd()
    {
        $dotks = DB::table('survey')  
        ->join('theme','survey.id_theme','=','theme.id')
        ->select('survey.*','NameTheme')->get();
    	return view('backend.question.add',['dotks'=>$dotks]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_survey'=>'required',
            'NameQuestion' => 'required',
            'PAA'=>'required',
            'PAB'=>'required',
            'PAC'=>'required',
            'PAD'=>'required',
            'PAD'=>'required',

    	],
    	[
            'id_survey.required'=>'Bạn chưa chọn Đợt Khảo Sát',
            'NameQuestion.required'=>'Bạn chưa nhập Câu Hỏi',
            'PAA.required'=>'Bạn chưa nhập Phương Án A',
            'PAB.required'=>'Bạn chưa nhập Phương Án B',
            'PAC.required'=>'Bạn chưa nhập Phương Án C',
            'PAD.required'=>'Bạn chưa nhập Phương Án D',
            
    	]);

        $cauhoi = new question;
        $cauhoi  ->id_survey = $request->id_survey;
        $cauhoi  ->NameQuestion = $request->NameQuestion;
        $cauhoi  ->PAA = $request->PAA;
        $cauhoi  ->PAB = $request->PAB;
        $cauhoi  ->PAC = $request->PAC;
        $cauhoi  ->PAD = $request->PAD;
        $cauhoi  ->PAE = $request->PAE;
        $cauhoi ->save();
        return redirect('admin/question/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $dotks = survey::all();
        $cauhoi = Question::find($id);
        return view('backend.question.edit',['cauhoi'=>$cauhoi,'dotks'=>$dotks]);
    }
    public function postEdit(Request $request, $id)
    {
        $cauhoi = question::find($id);
        $this->validate($request,
    	[
            'id_survey'=>'required',
            'NameQuestion' => 'required',
            'PAA'=>'required',
            'PAB'=>'required',
            'PAC'=>'required',
            'PAD'=>'required',
            'PAD'=>'required',

    	],
    	[
            'id_survey.required'=>'Bạn chưa chọn Đợt Khảo Sát',
            'NameQuestion.required'=>'Bạn chưa nhập Câu Hỏi',
            'PAA.required'=>'Bạn chưa nhập Phương Án A',
            'PAB.required'=>'Bạn chưa nhập Phương Án B',
            'PAC.required'=>'Bạn chưa nhập Phương Án C',
            'PAD.required'=>'Bạn chưa nhập Phương Án D',
            
    	]);
        $cauhoi = new question;
        $cauhoi  ->id_survey = $request->id_survey;
        $cauhoi  ->NameQuestion = $request->NameQuestion;
        $cauhoi  ->PAA = $request->PAA;
        $cauhoi  ->PAB = $request->PAB;
        $cauhoi  ->PAC = $request->PAC;
        $cauhoi  ->PAD = $request->PAD;
        $cauhoi  ->PAE = $request->PAE;
        $cauhoi ->save();
        return redirect('admin/question/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $cauhoi = question::find($id);
        $cauhoi ->delete();
        return redirect('admin/question/list')->with('thongbao','Xóa thành công');
    }
}
