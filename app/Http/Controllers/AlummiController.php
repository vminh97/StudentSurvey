<?php

namespace App\Http\Controllers;
use App\alummi;
use App\branch;
use App\company;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class AlummiController extends Controller
{
    public function getList()
    {
        $list = DB::table('alummi')  
        ->join('branch','alummi.id_branch','=','branch.id')
        ->join('company','alummi.id_company','=','company.id')
        ->select('alummi.*','NameBranch','NameCompany')
        ->get();
      //   dd('list');
          return view('backend.alummi.list',compact('list'));
    }
    public function getAdd()
    {
      $nganh = branch::all();
      $congty = company::all();
    	return view('backend.alummi.add',['nganh'=>$nganh,'congty'=>$congty]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    	[
            'id_branch'=>'required',
            'id_company'=>'required',
            'NameAlummi' => 'required|min:3|max:100',
            'Course'=>'required',
            'DateBirth'=>'required',
            'phone' => 'required|numeric|size:10',
            'email'=>'required|email',
            'Work'=>'required',
            'id_company'=>'required',
            'AddressCompany'=>'required',
            'Workcv'=>'required'
    	],
    	[
            'id_company.required'=>'Bạn chưa chọn công ty',
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameAlummi.required'=>'Bạn chưa nhập Tên cựu sinh viên',
            'NameAlummi.min'=>'Tối thiểu là 4 ký tự',
            'NameAlummi.max'=>'Tối đa là 20 ký tự',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email',
            'Phone.required'=>'Bạn phải nhập số điện thoại',
            'Phone.numeric'=>'bạn phải nhập đúng dạng con số',
            'Phone.size:10'=>'Số điện thoại có 10 chữ số',
            'Course.required'=>'Bạn chưa nhập Khóa Học',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh',
            'Work'=>'Bạn chưa nhập việc làm',
            'AddressCompany'=>'Bạn chưa nhập địa chỉ công ty',
            'Workcv'=>'Bạn chưa Nhập Chức Vụ'
    	]);

        $cuusv = new alummi;
        $cuusv ->id_company = $request->id_company;
        $cuusv ->id_branch = $request->id_branch;
        $cuusv ->NameAlummi = $request->NameAlummi;
        $cuusv->DateBirth = $request->DateBirth;
        $cuusv->Course = $request->Course;
        $cuusv->Phone = $request->Phone;
        $cuusv->Email = $request->Email;
        $cuusv->Work = $request->Work;
        $cuusv->AddressCompany= $request->AddressCompany;
        $cuusv->Workcv= $request->WorkCV;
        $cuusv ->save();
        return redirect('admin/alummi/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getEdit($id)
    {
        $nganh = branch::all();
        $congty = company::all();
        $cuusv= Alummi::find($id);
        return view('backend.alummi.edit',['nganh'=>$nganh,'congty'=>$congty,'cuusv'=>$cuusv]);
    }
    public function postEdit(Request $request, $id)
    {
        $cuusv = alummi::find($id);
        $this->validate($request,
        [
            'id_branch'=>'required',
            'id_company'=>'required',
            'NameAlummi' => 'required|min:3|max:100',
            'Course'=>'required',
            'DateBirth'=>'required',
            'phone' => 'required|numeric|size:10',
            'email'=>'required|email',
            'Work'=>'required',
            'id_company'=>'required',
            'AddressCompany'=>'required',
            'Workcv'=>'required'
    	],
    	[
            'id_company.required'=>'Bạn chưa chọn công ty',
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameAlummi.required'=>'Bạn chưa nhập Tên cựu sinh viên',
            'NameAlummi.min'=>'Tối thiểu là 4 ký tự',
            'NameAlummi.max'=>'Tối đa là 20 ký tự',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email',
            'Phone.required'=>'Bạn phải nhập số điện thoại',
            'Phone.numeric'=>'bạn phải nhập đúng dạng con số',
            'Phone.size:10'=>'Số điện thoại có 10 chữ số',
            'Course.required'=>'Bạn chưa nhập Khóa Học',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh',
            'Work'=>'Bạn chưa nhập việc làm',
            'AddressCompany'=>'Bạn chưa nhập địa chỉ công ty',
            'Workcv'=>'Bạn chưa Nhập Chức Vụ'
    	]);
  
          $cuusv ->id_company = $request->id_company;
          $cuusv ->id_branch = $request->id_branch;
          $cuusv ->NameAlummi = $request->NameAlummi;
          $cuusv->DateBirth = $request->DateBirth;
          $cuusv->Course = $request->Course;
          $cuusv->Phone = $request->Phone;
          $cuusv->Email = $request->Email;
          $cuusv->Work = $request->Work;
          $cuusv->AddressCompany= $request->AddressCompany;
          $cuusv->Workcv = $request->Workcv;
          $cuusv ->save();
          return redirect('admin/alummi/edit'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDelete($id)
    {
        $cuusv = alummi::find($id);
        $cuusv ->delete();
        return redirect('admin/alummi/list')->with('thongbao','Xóa thành công');
    }
}
