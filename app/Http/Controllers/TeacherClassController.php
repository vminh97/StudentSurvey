<?php

namespace App\Http\Controllers;
use App\teacherclass;
use App\subject;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class TeacherController extends Controller
{
    public function getList()
    {
        $list = DB::table('teterm')  
        ->join('subject','teacherclass.id_subject','=','subject.id')
        ->select('teacher.*','NameSubject')
        ->get();
      //   dd('list');
          return view('backend.teacherclass.list',compact('list'));
    }
    public function getAdd()
    {
        $bomon = subject::all();
    	return view('backend.teacherclass.add',['bomon'=>$bomon]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_subject'=>'required',
            'NameTeacher' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
          

    	],
    	[
            'id_subject.required'=>'Bạn chưa chọn Bộ Môn',
            'NameTeacher.required'=>'Bạn chưa nhập Tên giảng Viên',
            'NameTeacher.unique'=>'Bạn đã nhập trùng tên Tên giảng Viên',
            'NameTeacher.min'=>'Tối thiểu là 4 ký tự',
            'NameTeacher.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chri email'
    	]);

        $giaovien = new teacherclass;
        $giaovien ->id_subject = $request->id_subject;
        $giaovien ->NameTeacher = $request->NameTeacher;
        $giaovien->DateBirth = $request->DateBirth;
        $giaovien->Phone = $request->Phone;
        $giaovien->Email = $request->Email;
        $giaovien ->save();
        return redirect('admin/teacherclass/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $bomon = subject::all();
        $giaovien = teacherclass::find($id);
        return view('backend.teacher.edit',['giaovien'=>$giaovien,'bomon'=>$bomon]);
    }
    public function postEdit(Request $request, $id)
    {
        $giaovien = teacherclass::find($id);
        $this->validate($request,
    	[
            'id_subject'=>'required',
            'NameTeacher' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
          

    	],
    	[
            'id_subject.required'=>'Bạn chưa chọn Bộ Môn',
            'NameTeacher.required'=>'Bạn chưa nhập Tên giảng Viên',
            'NameTeacher.unique'=>'Bạn đã nhập trùng tên Tên giảng Viên',
            'NameTeacher.min'=>'Tối thiểu là 4 ký tự',
            'NameTeacher.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chri email'
    	]);
        $giaovien->id_subject = $request->id_subject;
        $giaovien->NameTeacher = $request->NameTeacher;
        $giaovien->DateBirth = $request->DateBirth;
        $giaovien->Phone = $request->Phone;
        $giaovien->Email = $request->Email;
        $giaovien ->save();
        return redirect('admin/teacherclass/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $giaovien = teacherclass::find($id);
        $giaovien ->delete();
        return redirect('admin/teacherclass/list')->with('thongbao','Xóa thành công');
    }
}
