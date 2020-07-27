<?php

namespace App\Http\Controllers;
use App\branch;
use App\student;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class StudentController extends Controller
{
    public function getList()
    {
        $list = DB::table('student')  
        ->join('branch','student.id_branch','=','branch.id')
        ->select('student.*','NameBranch')
        ->get();
      //   dd('list');
          return view('backend.student.list',compact('list'));
    }
    public function getAdd()
    {
        $nganh = branch::all();
    	return view('backend.student.add',['nganh'=>$nganh]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_branch'=>'required',
            'NameStudent' => 'required|min:3|max:100',
            'Phone'=>'required',
            'DateBirth'=>'required',
            'Email'=>'required|email'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn ngành học',
            'NameStudent.required'=>'Bạn chưa nhập Tên sinh viên',
            'NameStudent.min'=>'Tối thiểu là 4 ký tự',
            'NameStudent.max'=>'Tối đa là 20 ký tự',
            'DateBirth'=>'bạn chưa nhập ngày sinh',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email'
    	]);

        $sinhvien = new student;
        $sinhvien->id_branch = $request->id_branch;
        $sinhvien ->NameStudent = $request->NameStudent;
        $sinhvien->DateBirth = $request->DateBirth;
        $sinhvien->Phone = $request->Phone;
        $sinhvien->Email = $request->Email;
        $sinhvien ->save();
        return redirect('admin/student/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $nganh = branch::all();
        $sinhvien = student::find($id);
        return view('backend.student.edit',['sinhvien'=>$sinhvien,'nganh'=>$nganh]);
    }
    public function postEdit(Request $request, $id)
    {
        $sinhvien = student::find($id);
        $this->validate($request,
    	[
            'id_branch'=>'required',
            'NameStudent' => 'required|min:3|max:100',
            'Phone'=>'required',
            'DateBirth'=>'required',
            'Email'=>'required|email'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn ngành học',
            'NameStudent.required'=>'Bạn chưa nhập Tên sinh viên',
            'NameStudent.min'=>'Tối thiểu là 4 ký tự',
            'NameStudent.max'=>'Tối đa là 20 ký tự',
            'DateBirth'=>'bạn chưa nhập ngày sinh',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email'
    	]);
        $sinhvien->id_branch = $request->id_branch;
        $sinhvien ->NameStudent = $request->NameStudent;
        $sinhvien->DateBirth = $request->DateBirth;
        $sinhvien->Phone = $request->Phone;
        $sinhvien->Email = $request->Email;
        $sinhvien ->save();
        return redirect('admin/student/edit'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDelete($id)
    {
        $sinhvien = student::find($id);
        $sinhvien ->delete();
        return redirect('admin/student/list')->with('thongbao','Xóa thành công');
    }
}
