<?php

namespace App\Http\Controllers;

use App\faculty_tables;
use Illuminate\Http\Request;
use App\branch;
use Illuminate\support\Facades\DB;


class BranchController extends Controller
{
    public function getList()
    {
       
      $list = DB::table('branch')  
        ->join('faculty_tables','branch.id_faculty','=','faculty_tables.id')
        ->select('branch.*','NameFaculty')
        ->get();
        return view('backend.branch.list',compact('list'));
    }
    public function getAdd()
    {
        $vien = faculty_tables::all();
    	return view('backend.branch.add',['vien'=>$vien]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
    		'id_faculty'=>'required',
            'NameBranch' => 'required|min:3|max:100',          
    	],
    	[
            'id_faculty.required'=>'Bạn chưa chọn Bộ Môn',
    		'NameBranch.required' => 'Ban chua nhap ngành đào tạo',
    		'NameBranch.min' => 'tên ngành đào tạo phải trên 3 kí tự',
    		'NameBranch.max' => 'tên ngành đào tạo không quá 100 kí tự'
    	]);

        $nganh = new branch();
        $nganh ->id_faculty = $request->id_faculty;
    	$nganh->NameBranch = $request->NameBranch;
    	$nganh->save();
        return redirect('admin/branch/add')->with('thongbao','them thanh cong');
        // echo $request->NameFaculty;
    }
    public function getEdit($id)
    {
        $vien = faculty_tables::all();
        $nganh = branch::find($id);
        return view('backend.branch.edit',['vien'=>$vien,'nganh'=>$nganh]);
    }
    public function postEdit(Request $request, $id)
    {
        $nganh = branch::find($id);
        $this->validate($request,
    	[
            'id_faculty'=>'required',
            'NameBranch' => 'required|min:3|max:100',
            
    	],
    	[
            'id_faculty.required'=>'Bạn chưa chọn Bộ Môn',
            'NameBranch.required'=>'Bạn chưa nhập ngành đào tạo',
           
    	]);
        $nganh->id_faculty = $request->id_faculty;
        $nganh->NameBranch = $request->NameBranch;     
        $nganh ->save();
        return redirect('admin/branch/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $nganh = branch::find($id);
        $nganh ->delete();
        return redirect('admin/branch/list')->with('thongbao','Xóa thành công');
    }
}
