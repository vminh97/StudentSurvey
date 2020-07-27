<?php

namespace App\Http\Controllers;

use App\faculty_tables;

use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function getList()
    {
        $list = DB::table('faculty_tables')  
      ->select('*')
      ->get();
        return view('backend.faculty.list',compact('list'));
    }
    public function getAdd()
    {
    	return view('backend.faculty.add');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
    		
    		'NameFaculty' => 'required|min:3|max:100'
    	],
    	[
            
    		'NameFaculty.required' => 'bạn chưa nhập viện đào tạo',
    		'NameFaculty.min' => 'tên phải có ít nhất 3 kí tự',
    		'NameFaculty.max' => 'tên không quá 100 kí tự'
    	]);

    	$namefa = new Faculty_tables;
    	$namefa->NameFaculty = $request->NameFaculty;
    	$namefa->save();
        return redirect('admin/faculty/add')->with('thongbao','them thanh cong');
        // echo $request->NameFaculty;
    }
    public function getEdit($id)
    {
        $type = Faculty_Tables::find($id);
        return view('backend.faculty.edit',['type'=>$type]);
    }
    public function postEdit(Request $request, $id)
    {
        $type = Faculty_Tables::find($id);
        $this->validate($request,
            [
                'NameFaculty' => 'required|unique:Faculty_tables,NameFaculty|min:4|max:100',

            ],
            [
                'NameFaculty.required' => 'Bạn chưa nhập tên khoa đào tạo',
                'NameFaculty.unique' =>'Bạn đã nhập trùng tên khoa đào tạo',
                'NameFaculty.min' => 'Độ dài tối thiểu là 4 ký tự',
                'NameFaculty.max' =>'Độ dài tối đa là 20 ký tự'
            ]);
           
            $type->NameFaculty = $request->NameFaculty;
            $type->save();
            return redirect('admin/faculty/edit/'.$id)->with('thongbao','sửa thành công');
    }
    public function getDelete($id)
    {
        $type = faculty_tables::find($id);
        $type ->delete();
        return redirect('admin/faculty/list')->with('thongbao','Xóa thành công');
    }
}
