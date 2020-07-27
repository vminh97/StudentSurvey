<?php

namespace App\Http\Controllers;
use App\branch;
use App\term;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class TermController extends Controller
{
    public function getList()
    {
        $list = DB::table('term')  
        ->join('branch','term.id_branch','=','branch.id')
        ->select('term.*','NameBranch')
        ->get();
      //   dd('list');
          return view('backend.term.list',compact('list'));
    }
    public function getAdd()
    {
        $nganh = branch::all();
    	return view('backend.term.add',['nganh'=>$nganh]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_branch'=>'required',
            'NameTerm' => 'required|min:3|max:100',
            'NumberCredit'=>'required',
            'NumberTheory'=>'required',
            'NumberPractice'=>'required',
            'NumberExam' =>'required'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameTerm.required'=>'Bạn chưa nhập Tên giảng Viên',
            'NameTerm.unique'=>'Bạn đã nhập trùng tên Tên giảng Viên',
            'NameTerm.min'=>'Tối thiểu là 4 ký tự',
            'NameTerm.max'=>'Tối đa là 20 ký tự',
            'NumberCredit'=>'Bạn chưa nhập Số Tín Chỉ',
            'NumberTheory'=>'Bạn chưa nhập Số Tín chỉ Lý Thuyết',
            'NumberPractice'=>'Bạn chưa nhập Số Tín Chỉ Thực Hành',
            'NumberExam' =>'Bạn chưa nhập Số Tín Chỉ Bài Tập'
    	]);

        $hocphan = new term;
        $hocphan->id_branch = $request->id_branch;
        $hocphan ->NameTerm = $request->NameTerm;
        $hocphan->NumberCredit = $request->NumberCredit;
        $hocphan->NumberTheory = $request->NumberTheory;
        $hocphan->NumberPractice = $request->NumberPractice;
        $hocphan->NumberExam= $request->NumberExam;
        $hocphan ->save();
        return redirect('admin/term/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $nganh = branch::all();
        $hocphan = term::find($id);
        return view('backend.term.edit',['hocphan'=>$hocphan,'nganh'=>$nganh]);
    }
    public function postEdit(Request $request, $id)
    {
        $hocphan = term::find($id);
        $this->validate($request,
    	[
            'id_branch'=>'required',
            'NameTerm' => 'required|min:3|max:100',
            'NumberCredit'=>'required',
            'NumberTheory'=>'required',
            'NumberPractice'=>'required',
            'NumberExam' =>'required'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameTerm.required'=>'Bạn chưa nhập Tên giảng Viên',
            'NameTerm.unique'=>'Bạn đã nhập trùng tên Tên giảng Viên',
            'NameTerm.min'=>'Tối thiểu là 4 ký tự',
            'NameTerm.max'=>'Tối đa là 20 ký tự',
            'NumberCredit'=>'Bạn chưa nhập Số Tín Chỉ',
            'NumberTheory'=>'Bạn chưa nhập Số Tín chỉ Lý Thuyết',
            'NumberPractice'=>'Bạn chưa nhập Số Tín Chỉ Thực Hành',
            'NumberExam' =>'Bạn chưa nhập Số Tín Chỉ Bài Tập'
    	]);
        $hocphan = new term;
        $hocphan->id_branch = $request->id_branch;
        $hocphan ->NameTerm = $request->NameTerm;
        $hocphan->NumberCredit = $request->NumberCredit;
        $hocphan->NumberTheory = $request->NumberTheory;
        $hocphan->NumberPractice = $request->NumberPractice;
        $hocphan->NumberExam= $request->NumberExam;
        $hocphan ->save();
        return redirect('admin/term/edit'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $hocphan = term::find($id);
        $hocphan ->delete();
        return redirect('admin/term/list')->with('thongbao','Xóa thành công');
    }
}
