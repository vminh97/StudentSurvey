<?php

namespace App\Http\Controllers;
use App\survey;use App\stterm;
use App\question;use App\teterm;
use App\branch;use App\theme;
use App\kssvo;
use App\faculty_tables;
use App\subject;use App\kssvt;
use App\teacher;use App\kste;
use App\student;use App\ksalum;
use App\term;use App\company;
use App\classer;use App\personcompany;
use App\kscompany;
use App\alummi;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class PageController extends Controller
{
    //alummi
    public function getAddAlummi($id){
        $dotthi=survey::where('id', $id)->first();
		$prod=faculty_tables::all();//get data from table
        return view('frontend.SurveyAlummi.ctgv',compact('prod','dotthi'));//sent data to view
       
    }
	public function findNameBranch(Request $request){
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 
        //$request->id here is the id of our chosen option id
        $data=branch::select('NameBranch','id')->where('id_faculty',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	} 
    public function postAddAlummi(Request $request)
    {
    	$this->validate($request,
    	[
            'id_branch'=>'required',
            'NameAlummi' => 'required|min:3|max:100',
            'Phone' => 'required|numeric',
            'Email'=>'required|email',
            'Course'=>'required',
            'DateBirth'=>'required'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameAlummi.required'=>'Bạn chưa nhập Tên cựu sinh viên',
            'NameAlummi.min'=>'Tối thiểu là 4 ký tự',
            'NameAlummi.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Phone.numeric'=>'bạn phải nhập đúng chữ số',
            'Email.required'=>'Bạn chưa nhập địa chỉ email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng email',
            'Course.required'=>'Bạn chưa nhập khóa học',
            'DateBirth.required'=>'Bạn chưa nhập ngày sinh'
    	]);
        $cuusv = new alummi;
        $cuusv->id_branch = $request->id_branch;
        $cuusv->NameAlummi = $request->NameAlummi;
        $cuusv->DateBirth = $request->DateBirth;
        $cuusv->Phone = $request->Phone;
        $cuusv->Course =$request->Course;
        $cuusv->Email = $request->Email;
        $cuusv->save();
      
        $survey = question::where('id_survey',$request->survey)->get();
        $name =  $cuusv->NameAlummi;
        $idUser = $cuusv->id;
        $dotthi=survey::all();
        $id_survey = $request->survey;
   
        return view('frontend.SurveyAlummi.ks',compact('survey','name','idUser', 'id_survey', 'dotthi'));
        }
        

    public function postQuestionAlummi($idUser, Request $req){
        $id_survey = $req->id_survey;
        foreach ($req->input('questions', []) as $key => $question) {
            ksalum::create([
                'id_alummi' => $idUser,
                'id_question' => $question,
                'id_survey' => $id_survey,
                'answer' => $req->input('onechange.'.$question),
            ]);
        }
        return redirect('trang-chu');
    }
    ///student
    public function getAddStudent($id){
        $dotthi=survey::where('id', $id)->first();
		$prod=faculty_tables::all();//get data from table
		return view('frontend.SurveyStudent.ctgv',compact('prod','dotthi'));//sent data to view

    }  

    public function postAddStudent(Request $request)
    {
      //dd($request->all());
    	$this->validate($request,
    	[
            'id_branch'=>'required',
            'NameStudent' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
            'DateBirth'=>'required'
    	],
    	[
            'id_branch.required'=>'Bạn chưa chọn Bộ Môn',
            'NameStudent.required'=>'Bạn chưa nhập Tên sinh viên',
            'NameStudent.min'=>'Tối thiểu là 4 ký tự',
            'NameStudent.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập unit sản phẩm',
            'Email.required'=>'Bạn chưa nhập new sản phẩm',
            'DateBirth.required'=>'Bạn chưa nhập new sản phẩm'
    	]);
        $sv = new student;
        $sv->id_branch = $request->id_branch;
        $sv->NameStudent = $request->NameStudent;
        $sv->DateBirth = $request->DateBirth;
        $sv->Phone = $request->Phone;
        $sv->Email = $request->Email;
        $sv->save();
      
        $survey = question::where('id_survey',$request->survey)->get();
        $name =  $sv->NameStudent;
        $idUser = $sv->id;
        $dotthi=survey::all();
        $id_survey = $request->survey;
   
        return view('frontend.SurveyStudent.ks',compact('survey','name','idUser', 'id_survey', 'dotthi'));
        }
        
    public function postQuestionStudent($idUser, Request $req){
        $id_survey = $req->id_survey;
        foreach ($req->input('questions', []) as $key => $question) {
            kssvt::create([
                'id_student' => $idUser,
                'id_question' => $question,
                'id_survey' => $id_survey,
                'answer' => $req->input('onechange.'.$question),
            ]);
        }
        return redirect('trang-chu');
    }
    //teacher
    public function getAddTeacher($id){
        $dotthi=survey::where('id', $id)->first();
		$prod=faculty_tables::all();//get data from table
		return view('frontend.SurveyTeacher.ctgv',compact('prod','dotthi'));//sent data to view

    }
	public function findNameSubject(Request $request){
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 
        //$request->id here is the id of our chosen option id
        $data=subject::select('NameSubject','id')->where('id_faculty',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }   
    public function  postAddTeacher(Request $request)
    {
    //   dd($request->all());
    	$this->validate($request,
    	[
            'id_subject'=>'required',
            'NameTeacher' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
            'DateBirth'=>'required'
    	],
    	[
            'id_subject.required'=>'Bạn chưa chọn Bộ Môn',
            'NameTeacher.required'=>'Bạn chưa nhập Tên giáo viên',
            'NameTeacher.min'=>'Tối thiểu là 4 ký tự',
            'NameTeacher.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập Email',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh'
        ]);
        
        // dd($request->id_subject);
        $gv = new teterm;
        $gv->id_subject = $request->id_subject;
        $gv->NameTeacher = $request->NameTeacher;
        $gv->DateBirth = $request->DateBirth;
        $gv->Phone = $request->Phone;
        $gv->Email = $request->Email;
        $gv->save();
            
        $survey = question::where('id_survey',$request->survey)->get();
        $name =  $gv->NameTeacher;
        $idUser = $gv->id;
        $dotthi=survey::all();
        $id_survey = $request->survey;
        return view('frontend.SurveyTeacher.ks',compact('survey','name','idUser', 'id_survey', 'dotthi'));
        }
        
    public function postQuestionTeacher($idUser, Request $req){
        $id_survey = $req->id_survey;
        foreach ($req->input('questions', []) as $key => $question) {
            kste::create([
                'id_teacher' => $idUser,
                'id_question' => $question,
                'id_survey' => $id_survey,
                'answer' => $req->input('onechange.'.$question),
            ]);
        }
        return redirect('trang-chu');
    }
    //term
    public function getAddTerm($id){
        $dotthi=survey::where('id', $id)->first();
		$prod=faculty_tables::all();//get data from table
		return view('frontend.SurveyTerm.ct',compact('prod','dotthi'));//sent data to view

    }
    public function postAddTerm(Request $request)
    {
    	$this->validate($request,
    	[
            'subject'=>'required',
            'NameStudent' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
            'DateBirth'=>'required',
    	],
    	[
            'subject.required'=>'Bạn chưa chọn Bộ Môn',
            'NameStudent.required'=>'Bạn chưa nhập Tên giáo viên',
            'NameStudent.min'=>'Tối thiểu là 4 ký tự',
            'NameStudent.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
            'Email.required'=>'Bạn chưa nhập Email',
            'DateBirth.required'=>'Bạn chưa nhập Ngày Sinh'
    	]);
        $gv = new stterm;
        $gv->id_branch = $request->branch;
        $gv->NameStudent = $request->NameStudent;
        $gv->DateBirth = $request->DateBirth;
        $gv->Phone = $request->Phone;
        $gv->Email = $request->Email;
        $gv->save();

        $survey = question::where('id_survey',$request->survey)->get();
        $name =  $gv->NameStudent;
        $teacher =  $request->teacher;
        $class= $request->class;
        $idUser = $gv->id;
        $dotthi=survey::all();
        $id_survey = $request->survey;

   

       
   
        return view('frontend.SurveyTerm.ks',compact('survey','name','idUser', 'id_survey', 'dotthi','teacher','class'));
    }
        
    public function postQuestionTerm($idUser, Request $req){
        $teacher = $req->teacher;
        $class = $req->class;
        $id_survey = $req->id_survey;
        foreach ($req->input('questions', []) as $key => $question) {
            kssvo::create([
                'id_stterm' =>$idUser,
                'id_question' => $question,
                'id_survey' => $id_survey,
                'id_teacher' =>$teacher,
                'id_class'=>$class,
                'answer' => $req->input('onechange.'.$question),
            ]);
        }
        return redirect('trang-chu');
    }

    //company
    public function getAddCompany($id){
        $dotthi=survey::where('id', $id)->first();
        $proda= company::all();
		return view('frontend.SurveyCompany.a',compact('proda','dotthi'));
    }
  
    public function postAddCompany(Request $request)
    {
      //dd($request->all());
    	$this->validate($request,
    	[
            'id_company'=>'required',
            'Name' => 'required|min:3|max:100',
            'Phone'=>'required',
            'Email'=>'required',
            'DateBirth'=>'required',
            'position'=>'required',
            'ResponsibleWork'=>'required'
    	],
    	[
            'id_company.required'=>'Bạn chưa chọn công ty',
            'Name.required'=>'Bạn chưa nhập Tên cựu sinh viên',
            'Name.min'=>'Tối thiểu là 4 ký tự',
            'Name.max'=>'Tối đa là 20 ký tự',
            'Phone.required'=>'Bạn chưa nhập unit sản phẩm',
            'Email.required'=>'Bạn chưa nhập new sản phẩm',
            'position.required'=>'Bạn chưa nhập new sản phẩm',
            'ResponsibleWork.required'=>'Bạn chưa nhập vị trí làm việc',
            'DateBirth.required'=>'Bạn chưa nhập new sản phẩm'
    	]);
        $ct = new personcompany();
        $ct->id_company = $request->id_company;
        $ct->Name = $request->Name;
        $ct->DateBirth = $request->DateBirth;
        $ct->Phone = $request->Phone;
        $ct->position =$request->position;
        $ct->ResponsibleWork = $request->ResponsibleWork;
        $ct->Email = $request->Email;
        $ct->save();
      
        $survey = question::where('id_survey',$request->survey)->get();
        $name =  $ct->Name;
        $idUser = $ct->id;
        $dotthi=survey::all();
        $id_survey = $request->survey;
   
        
        return view('frontend.SurveyCompany.b',compact('survey','name','idUser', 'id_survey', 'dotthi'));
    }
    
        
    public function postQuestionCompany($idUser, Request $req){
        $id_survey = $req->id_survey;
        foreach ($req->input('questions', []) as $key => $question) {
            kscompany::create([
                'id_personcom' => $idUser,
                'id_question' => $question,
                'id_survey' => $id_survey,
                'answer' => $req->input('onechange.'.$question),
            ]);
        }
        return redirect('trang-chu');
    }

    
}
     