<?php

namespace App\Http\Controllers;
use App\company;
use App\personcompany;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class PersonController extends Controller
{
    public function getList()
    {
        $list = DB::table('personcompany')  
        ->join('company','personcompany.id_company','=','company.id')
        ->select('personcompany.*','NameCompany')
        ->get();
      //   dd('list');
          return view('backend.personcompany.list',compact('list'));
    }
    public function getAdd()
    {
        $company = company::all();
    	return view('backend.personcompany.add',['company'=>$company]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_company'=>'required',
            'Name' => 'required|min:3|max:100',
            'DateBirth' => 'required',
            'Phone'=>'required',
            'Email'=>'required',
            'position'=>'required',
            'ResponsibleWork'=>'required'
    	],
    	[
            'id_company.required'=>'Bạn chưa chọn Công Ty',
            'Name.required'=>'Bạn chưa nhập Họ Tên',
            'Name.min'=>'Tối thiểu là 4 ký tự',
            'Name.max'=>'Tối đa là 20 ký tự',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh',
            'Phone.required'=>'Bạn chưa nhập Số Điện Thoại',
            'Email.required'=>'Bạn chưa nhập Email',
            'position.required'=>'Bạn chưa nhập Chức Vụ',
            'ResponsibleWork.required'=>'Bạn chưa nhập Công Việc Đảm Nhiệm',
    	]);

        $nguoi = new personcompany;
        $nguoi ->id_company = $request->id_company;
        $nguoi ->Name = $request->Name;
        $nguoi->DateBirth = $request->DateBirth;
        $nguoi->Phone = $request->Phone;
        $nguoi->Email = $request->Email;
        $nguoi->position = $request->position;
        $nguoi->ResponsibleWork = $request->ResponsibleWork;
        $nguoi ->save();
        return redirect('admin/personcompany/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $congty = company::all();
        $nguoi = personcompany::find($id);
        return view('backend.personcompany.edit',['congty'=>$congty,'nguoi'=>$nguoi]);
    }
    public function postEdit(Request $request, $id)
    {
        $nguoi = personcompany::find($id);
        $this->validate($request,
    	[
            'id_company'=>'required',
            'Name' => 'required|min:3|max:100',
            'DateBirth' => 'required',
            'Phone'=>'required',
            'Email'=>'required',
            'position'=>'required',
            'ResponsibleWork'=>'required'
    	],
    	[
            'id_company.required'=>'Bạn chưa chọn Công Ty',
            'Name.required'=>'Bạn chưa nhập Họ Tên',
            'Name.min'=>'Tối thiểu là 4 ký tự',
            'Name.max'=>'Tối đa là 20 ký tự',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh',
            'Phone.required'=>'Bạn chưa nhập Số Điện Thoại',
            'Email.required'=>'Bạn chưa nhập Email',
            'position.required'=>'Bạn chưa nhập Chức Vụ',
            'ResponsibleWork.required'=>'Bạn chưa nhập Công Việc Đảm Nhiệm',
    	]);
        $nguoi ->id_company = $request->id_company;
        $nguoi ->Name = $request->Name;
        $nguoi->DateBirth = $request->DateBirth;
        $nguoi->Phone = $request->Phone;
        $nguoi->Email = $request->Email;
        $nguoi->position = $request->position;
        $nguoi->ResponsibleWork = $request->ResponsibleWork;
        $nguoi ->save();
        return redirect('admin/personcompany/edit'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDelete($id)
    {
        $nguoi = personcompany::find($id);
        $nguoi ->delete();
        return redirect('admin/personcompany/list')->with('thongbao','Xóa thành công');
    }
}
