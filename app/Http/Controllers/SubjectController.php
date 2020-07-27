<?php

namespace App\Http\Controllers;
use App\faculty_tables;
use App\subject;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class SubjectController extends Controller
{
    public function getList()
    {
        $list = DB::table('subject')  
        ->join('faculty_tables','subject.id_faculty','=','faculty_tables.id')
        ->select('subject.*','NameFaculty')
        ->get();
      //   dd('list');
          return view('backend.subject.list',compact('list'));
    }
    public function getAdd()
    {
        $vien = faculty_tables::all();
    	return view('backend.subject.add',['vien'=>$vien]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_faculty'=>'required',
            'NameSubject' => 'required|min:3|max:100',
    	],
    	[
            'id_faculty.required'=>'Bạn chưa chọn khoa đào tạo',
            'NameSubject.required'=>'Bạn chưa nhập tên bộ môn',
            'NameSubject.unique'=>'Bạn đã nhập trùng tên bộ môn',
            'NameSubject.min'=>'Tối thiểu là 4 ký tự',
            'NameSubject.max'=>'Tối đa là 20 ký tự',
    	]);

        $bomon = new subject;
        $bomon ->id_faculty = $request->id_faculty;
        $bomon ->NameSubject = $request->NameSubject;
        $bomon ->save();
        return redirect('admin/subject/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $bomon = subject::all();
        $vien = faculty_tables::find($id);
        return view('backend.subject.edit',['vien'=>$vien,'bomon'=>$bomon]);
    }
    public function postEdit(Request $request, $id)
    {
        $bomon = subject::find($id);
        $this->validate($request,
    	[
            'id_faculty'=>'required',
            'NameSubject' => 'required|min:3|max:100',
    	],
    	[
            'id_faculty.required'=>'Bạn chưa chọn khoa đào tạo',
            'NameSubject.required'=>'Bạn chưa nhập Tên bộ môn',
            'NameSubject.unique'=>'Bạn đã nhập trùng tên Tên bộ môn',
            'NameSubject.min'=>'Tối thiểu là 4 ký tự',
            'NameSubject.max'=>'Tối đa là 20 ký tự',
    	]);

        $bomon ->id_faculty= $request->id_faculty;
        $bomon ->NameSubject = $request->NameSubject;
        $bomon ->save();
        return redirect('admin/subject/edit'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDelete($id)
    {
        $bomon = subject::find($id);
        $bomon ->delete();
        return redirect('admin/subject/list')->with('thongbao','Xóa thành công');
    }
}
