<?php

namespace App\Http\Controllers;
use App\theme;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class ThemeController extends Controller
{
    public function getList()
    {
        $list = DB::table('theme')  
      ->select('*')
      ->get();
        return view('backend.theme.list',compact('list'));
    }
    public function getAdd()
    {
    	return view('backend.theme.add');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
    		
    		'NameTheme' => 'required|min:3|max:100'
    	],
    	[
            
    		'NameTheme.required' => 'Bạn chưa nhập tên chủ đề',
    		'NameTheme.min' => 'tên chủ đề phải có ít nhất 3 ký tự',
    		'NameTheme.max' => 'Tên chủ đề không quá 100 ký tự'
    	]);

    	$namefa = new theme;
    	$namefa->NameTheme = $request->NameTheme;
    	$namefa->save();
        return redirect('admin/theme/add')->with('thongbao','them thanh cong');
        // echo $request->NameFaculty;
    }
    public function getEdit($id)
    {
        $type = theme::find($id);
        return view('backend.theme.edit',['type'=>$type]);
    }
    public function postEdit(Request $request, $id)
    {
        $type = theme::find($id);
        $this->validate($request,
            [
                'NameTheme' => 'required|min:3|max:100',

            ],
            [
                'NameTheme.required' => 'Bạn chưa nhập tên chủ đề',
                'NameTheme.min' => 'tên chủ đề phải có ít nhất 3 ký tự',
                'NameTheme.max' => 'Tên chủ đề không quá 100 ký tự'
            ]);
            $type->NameTheme = $request->NameTheme;
            $type->save();
            return redirect('admin/theme/edit/'.$id)->with('thongbao','sửa thành công');
    }
    public function getDelete($id)
    {
        $type = theme::find($id);
        $type ->delete();
        return redirect('admin/theme/list')->with('thongbao','Xóa thành công');
    }
}
