<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\alummi;
use App\theme;
use App\branch;
use App\survey;
use App\faculty_tables;
use App\User;
use App\News;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\link;
use User as GlobalUser;

class MyController extends Controller
{
     
  public function getlisthp(){
    $kshp = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme','NameSurvey')
    ->where('id_theme','=','1')->get();
   

    $ksall = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme','NameSurvey')
    ->where('id_theme','>','1')->paginate(5);

    $new = DB::table('new')
    ->select('new.id','title','content')->get();
    return view('frontend.index',['kshp'=>$kshp,'ksall'=>$ksall,'new'=>$new]);
  }
  public function getsv(){
    $kssv = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme')
    ->where('type','=','Sinh Viên')->get();
    return view('frontend.all.sv',compact('kssv'));
  }
  public function getct(){
    $kssv = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme')
    ->where('type','=','Doanh Nghiệp')->get();
    return view('frontend.all.ct',compact('kssv'));
  }
  public function getcsv(){
    $kssv = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme')
    ->where('type','=','Cựu Sinh Viên')->get();
    return view('frontend.all.csv',compact('kssv'));
  }
  public function getgv(){
    $kssv = DB::table('survey') 
    ->join('theme','survey.id_theme','=','theme.id')
    ->select('survey.*','NameTheme')
    ->where('type','=','Giảng Viên')->get();
    return view('frontend.all.gv',compact('kssv'));
  }



  public function getnew($id){
    $baoaa=News::where('id', $id)->first();
    return view('frontend.news',compact('baoaa'));
   }



   
  public function gethd()
  {
      return view('frontend.qa');
  }
  
  public function getgt()
  {
      return view('frontend.introduce');
  }
  public function gethdan()
  {
      return view('frontend.tutotal');
  }
  public function getlist()
  {
    $nguoisd  = DB::table('users') 
    ->select('users.*',)
    ->get();
    return view('backend.user.list',compact('nguoisd'));
  }
 
   
  public function getAdd()
  {
      
    return view('backend.user.add');
  }
  public function postAdd(Request $request)
  {
    $this->validate($request,
          [
              'full_name'=>'required|min:4',
              'password'=>'required|min:6|max:20',
              'remember_token'=>'required|same:password',
              'phone' => 'required|numeric',
              'email'=>'required',
              'address'=>'required'
          ],
          [
              'full_name.required'=>'Bạn chưa nhập tên',
              'full_name.min'=>'Tối thiểu là 4 ký tự',
              'password.required'=>'Bạn chưa nhập mật khẩu',
              'password.min'=>'Tối thiểu 6 ký tự',
              'password.max'=>'Tối đa 20 ký tự',
              'remember_token.required'=>'Bạn chưa nhập lại mật khẩu',
              'remember_token.same'=>'Bạn đã nhập khác mật khẩu',
              'email.required'=>'Bạn chưa nhập email',
              'phone.required'=>'Bạn phải nhập số điện thoại',
              'phone.numeric'=>'bạn phải nhập đúng dạng con số',
              'phone.size:10'=>'Số điện thoại có 10 chữ số',
              'address.required'=>'Bạn chưa nhập địa chỉ',
              
          ]);
      
      $nguoisd = new User;
      $nguoisd->full_name = $request->full_name;
      $nguoisd->email = $request->email;
      $nguoisd->password = bcrypt($request->password);
      $nguoisd->remember_token = bcrypt($request->remember_token);
      $nguoisd->address = $request->address;
      $nguoisd->phone = $request->phone;
      
      $nguoisd->save();
      return redirect('admin/user/add')->with('thongbao','Bạn đã thêm thành công');
  }

  public function getEdit($id)
  {
      $nguoisd = User::find($id);
      return view('backend.user.edit',['nguoisd'=>$nguoisd]);   
  }
  public function postEdit(Request $request, $id)
  {
          $this->validate($request,
          [
            'full_name'=>'required|min:4',
            'phone' => 'required|regex:/(01)[0-9]{9}/|size:10',
            'email'=>'required',
            'password'=>'required|min:6|max:20',
            'remember_token'=>'required|same:password',
            'address'=>'required'
        ],
        [
            'full_name.required'=>'Bạn chưa nhập tên',
            'full_name.min'=>'Tối thiểu là 4 ký tự',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.regex:/(01)[0-9]{9}/'=>'bạn phải nhập đúng chữ số',
            'phone.size:10'=>'Số điện thoại có 10 chữ số',
            'email.required'=>'Bạn chưa nhập địa chỉ email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>' Mật Khẩu Tối thiểu 6 ký tự',
            'password.max'=>' Mật Khẩu Tối đa 20 ký tự',
            'remember_token.required'=>'Bạn chưa nhập lại mật khẩu',
            'remember_token.same'=>'Bạn đã nhập khác mật khẩu',
            'address.required'=>'Bạn chưa nhập địa chỉ'
        ]);
      $nguoisd = User::find($id);
      $nguoisd->full_name = $request->full_name;    
      $nguoisd->address = $request->address;
      $nguoisd->phone = $request->phone;
      $nguoisd->email = $request->email;
      if($request->changePassword == "on")
      {
          $this->validate($request,
          [
              'password'=>'required|min:6|max:20',
              'remember_token'=>'required|same:password'
          ],
          [   
              'password.required'=>'Bạn chưa nhập mật khẩu',
              'password.min'=>'Tối thiểu 6 ký tự',
              'password.max'=>'Tối đa 20 ký tự',
              'remember_token.required'=>'Bạn chưa nhập lại mật khẩu',
              'remember_token.same'=>'Bạn đã nhập khác mật khẩu'
          ]);    
          $nguoisd->password = bcrypt($request->password);
      }    
      $nguoisd->save();

      return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');
  }

  public function getDelete($id)
  {
      $nguoisd = User::find($id);
      $nguoisd -> delete();
      return redirect('admin/user/list')->with('thongbao','Xóa thành công');
  }

  public function getDangnhapAdmin()
  {
      return view('backend.login');
  }
  public function postDangnhapAdmin(Request $request)
  {
      $this->validate($request,
          [
              'email'=>'required',
              'password'=>'required|min:6|max:20'
          ],
          [
              'email.required'=>'Bạn chưa nhập email',
              'password.required'=>'Bạn chưa nhập mật khẩu',
              'password.min'=>'Tối thiểu 6 ký tự',
              'password.max'=>'Tối đa 20 ký tự'
          ]);
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {
          return redirect('admin/thongke');
      }
      else
      {
          return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
      }
  }

  public function getDangxuatAdmin()
  {
      Auth::logout();
      return redirect('admin/dangnhap')->with('thongbao','Đã đăng xuất');
  }
    
    
}
