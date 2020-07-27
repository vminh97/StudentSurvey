<?php

namespace App\Http\Controllers;
use App\branch;
use App\stterm;
use App\studentclass;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class StudentClassController extends Controller
{
    public function getList()
    {
        $list = DB::table('stterm')  
        ->join('branch','stterm.id_branch','=','branch.id')
        ->select('stterm.*','NameBranch')
        ->get();
      //   dd('list');
          return view('backend.studentclass.list',compact('list'));
    }
    public function getAdd()
    {
        $nganh = branch::all();
    	return view('backend.studentclass.add',['nganh'=>$nganh]);
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
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameStudent.required'=>'Bạn chưa nhập Tên giảng Viên',
            'NameStudent.min'=>'Tối thiểu là 4 ký tự',
            'NameStudent.max'=>'Tối đa là 20 ký tự',
            'DateBirth'=>'bạn chưa nhập ngày sinh',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email'
    	]);

        $sinhvien = new studentclass;
        $sinhvien->id_branch = $request->id_branch;
        $sinhvien ->NameStudent = $request->NameStudent;
        $sinhvien->DateBirth = $request->DateBirth;
        $sinhvien->Phone = $request->Phone;
        $sinhvien->Email = $request->Email;
        $sinhvien ->save();
        return redirect('admin/studentclass/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $nganh = branch::all();
        $sinhvien = studentclass::find($id);
        return view('backend.studentclass.edit',['sinhvien'=>$sinhvien,'nganh'=>$nganh]);
    }
    public function postEdit(Request $request, $id)
    {
        $sinhvien = studentclass::find($id);
        $this->validate($request,
    	[
            'id_branch'=>'required',
            'NameStudent' => 'required|min:3|max:100',
            'Phone'=>'required',
            'DateBirth'=>'required',
            'Email'=>'required|email'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameStudent.required'=>'Bạn chưa nhập Tên giảng Viên',
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
        return redirect('admin/studentclass/add'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDelete($id)
    {
        $sinhvien = studentclass::find($id);
        $sinhvien ->delete();
        return redirect('admin/studentclass/list')->with('thongbao','Xóa thành công');
    }
}
