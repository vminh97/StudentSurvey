<?php

namespace App\Http\Controllers;
use App\company;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class CompanyController extends Controller
{
    public function getList()
    {
        $list = DB::table('company')  
        ->select('*')
        ->get();
      //   dd('list');
          return view('backend.company.list',compact('list'));
    }
    public function getAdd()
    {
    	return view('backend.company.add');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'NameCompany' => 'required|min:3|max:100',
            'Nameone' =>'required|min:3|max:100',
            'Address' =>'required',
            'Phone'=>'required',
            'Email'=>'require|email',
            'Flag'=>'required'
    	],
    	[
            'NameCompany.required'=>'Bạn chưa nhập Tên công ty',
            'NameCompany.min'=>'Tối thiểu là 4 ký tự',
            'NameCompany.max'=>'Tối đa là 20 ký tự',
            'NameOne.required'=>'Bạn chưa nhập người đại diện',
            'NameOne.min'=>'Tối thiểu là 4 ký tự',
            'NameOne.max'=>'Tối đa là 20 ký tự',
            'Address.required'=>'Bạn chưa nhập địa chỉ',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng Email'
    	]);

        $congty = new company;
        $congty ->NameCompany = $request->NameCompany;
        $congty->NameOne = $request->NameOne;
        $congty->Adress = $request->Address;
        $congty->Phone = $request->Phone;
        $congty->Email = $request->Email;
        $congty->Flag = $request->Flag;
        $congty ->save();
        return redirect('admin/company/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $congty = company::find($id);
        return view('backend.company.edit',['congty'=>$congty]);
    }
    public function postEdit(Request $request, $id)
    {
        $congty = company::find($id);
    	$this->validate($request,
    	[
            'NameCompany' => 'required|min:3|max:100',
            'Nameone' =>'required|min:3|max:100',
            'Address' =>'required',
            'Phone'=>'required',
            'Email'=>'require|email',
            'Flag'=>'required'
    	],
    	[
            'NameCompany.required'=>'Bạn chưa nhập Tên công ty',
            'NameCompany.min'=>'Tối thiểu là 4 ký tự',
            'NameCompany.max'=>'Tối đa là 20 ký tự',
            'NameOne.required'=>'Bạn chưa nhập người đại diện',
            'NameOne.min'=>'Tối thiểu là 4 ký tự',
            'NameOne.max'=>'Tối đa là 20 ký tự',
            'Address.required'=>'Bạn chưa nhập địa chỉ',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng Email'
    	]);

        $congty ->NameCompany = $request->NameCompany;
        $congty->NameOne = $request->NameOne;
        $congty->Adress = $request->Address;
        $congty->Phone = $request->Phone;
        $congty->Email = $request->Email;
        $congty->Flag = $request->Flag;
        $congty ->save();
        return redirect('admin/company/edit'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id)
    {
        $congty = company::find($id);
        $congty ->delete();
        return redirect('admin/company/list')->with('thongbao','Xóa thành công');
    }
}
