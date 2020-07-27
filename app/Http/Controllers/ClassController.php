<?php

namespace App\Http\Controllers;
use App\classer;
use App\term;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class ClassController extends Controller
{
    public function getList()
    {
        $list = DB::table('class')  
        ->join('term','class.id_term','=','term.id')
        ->select('class.*','NameTerm')
        ->get();
      //   dd('list');
          return view('backend.class.list',compact('list'));
    }
    public function getAdd()
    {
        $hocphan = term::all();
    	return view('backend.class.add',['hocphan'=>$hocphan]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_term'=>'required',
            'NameClass' => 'required|min:3|max:100',
            'Semester'=>'required|Numeric',
            'YearSchool'=>'required'
    	],
    	[
            'id_term.required'=>'Bạn chưa chọn Bộ Môn',
            'NameClass.required'=>'Bạn chưa nhập Tên Lớp Học Phần',
            'NameClass.unique'=>'Bạn đã nhập trùng tên Lớp Học Phần',
            'NameClass.min'=>'Tối thiểu là 4 ký tự',
            'NameClass.max'=>'Tối đa là 20 ký tự',
            'Semester.required'=>'Bạn chưa nhập Học Kì',
            'Semester.numeric'=>'bạn phải nhập đúng dạng con số',
            'YearSchool.required'=>'Bạn chưa nhập Năm Học'
    	]);

        $lop = new classer;
        $lop ->id_term = $request->id_term;
        $lop ->NameClass = $request->NameClass;
        $lop ->Semester = $request->Semester;
        $lop ->YearSchool= $request->YearSchool;
        $lop ->save();
        return redirect('admin/class/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $hocphan = term::all();
        $lop = classer::find($id);
        return view('backend.class.edit',['lop'=>$lop,'hocphan'=>$hocphan]);
    }
    public function postEdit(Request $request, $id)
    {
        $lop = classer::find($id);
        $this->validate($request,
    	[
            'id_term'=>'required',
            'NameClass' => 'required|min:3|max:100',
            'Semester'=>'required',
            'YearSchool'=>'required'
    	],
    	[
            'id_term.required'=>'Bạn chưa chọn Bộ Môn',
            'NameClass.required'=>'Bạn chưa nhập Tên Lớp Học Phần',
            'NameClass.unique'=>'Bạn đã nhập trùng tên Lớp Học Phần',
            'NameClass.min'=>'Tối thiểu là 4 ký tự',
            'NameClass.max'=>'Tối đa là 20 ký tự',
            'Semester.required'=>'Bạn chưa nhập Học Kì',
            'YearSchool.required'=>'Bạn chưa nhập Năm Học'
    	]);
        $lop ->id_term = $request->id_term;
        $lop ->NameClass = $request->NameClass;
        $lop ->Semester = $request->Semester;
        $lop ->YearSchool= $request->YearSchool;
        $lop ->save();
        return redirect('admin/class/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $lop = classer::find($id);
        $lop ->delete();
        return redirect('admin/class/list')->with('thongbao','Xóa thành công');
    }
}
