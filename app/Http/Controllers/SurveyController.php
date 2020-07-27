<?php

namespace App\Http\Controllers;
use App\theme;
use App\survey;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class SurveyController extends Controller
{
    public function getList()
    {
        $list = DB::table('survey')  
        ->join('theme','survey.id_theme','=','theme.id')
        ->select('survey.*','NameTheme')
        ->get();
      //   dd('list');
          return view('backend.survey.list',compact('list'));
    }
    public function getAdd()
    {
        $chude = theme::all();
    	return view('backend.survey.add',['chude'=>$chude]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_theme'=>'required',
            'NameSurvey' => 'required|min:3|max:100',
            'type'=>'required'
    	],
    	[
            'id_theme.required'=>'Bạn chưa chọn chủ đề khảo sát',
            'NameSurvey.required'=>'Bạn chưa nhập Tên Đợt Khảo Sát',
            'NameSurvey.min'=>'Tối thiểu là 4 ký tự',
            'NameSurvey.max'=>'Tối đa là 20 ký tự',
            'type'=>'bạn chưa nhập tên'

    	]);

        $dotks = new survey;
        $dotks ->id_theme = $request->id_theme;
        $dotks ->NameSurvey = $request->NameSurvey;
        $dotks ->type =$request->type;
        $dotks ->save();
        return redirect('admin/survey/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $chude = theme::all();
        $dotks = survey::find($id);
        return view('backend.survey.edit',['chude'=>$chude,'dotks'=>$dotks]);
    }
    public function postEdit(Request $request, $id)
    {
        $dotks = survey::find($id);
        $this->validate($request,
    	[
            'id_theme'=>'required',
            'NameSurvey' => 'required|min:3|max:100',
            'type'=>'required'
    	],
    	[
            'id_theme.required'=>'Bạn chưa chọn chủ đề khảo sát',
            'NameSurvey.required'=>'Bạn chưa nhập Tên Đợt Khảo Sát',
            'NameSurvey.min'=>'Tối thiểu là 4 ký tự',
            'NameSurvey.max'=>'Tối đa là 20 ký tự',
            'type'=>'bạn chưa nhập tên'

    	]);
        $dotks ->id_theme = $request->id_theme;
        $dotks ->NameSurvey = $request->NameSurvey;
        $dotks ->type = $request->type;
        $dotks ->save();
        return redirect('admin/survey/edit'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $dotks = survey::find($id);
        $dotks ->delete();
        return redirect('admin/survey/list')->with('thongbao','Xóa thành công');
    }
}
