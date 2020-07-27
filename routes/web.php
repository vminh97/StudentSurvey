<?php

use App\Http\Controllers\ABController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('e',[
	view('frontend.success')
]);
Route::get('ab',[
	view('frontend.index')
]);
Route::get('trang-chu',[
	'as'=>'trangchu',
	'uses'=>'MyController@getlisthp'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'MyController@getgt'
]);
Route::get('hoi-dap',[
	'as'=>'hoidap',
	'uses'=>'MyController@gethd'
]);
Route::get('huong-dan',[
	'as'=>'huongdan',
	'uses'=>'MyController@gethdan'
]);
Route::get('/new/{id}','MyController@getnew');




Route::get('/sv','MyController@getsv');
Route::get('/csv','MyController@getcsv');
Route::get('/gv','MyController@getgv');
Route::get('/ct','MyController@getct');

	   


Route::get('ajax/branch/{id}', 'AjaxController@getBranch');
Route::get('ajax/term/{id}', 'AjaxController@getTerm');
Route::get('ajax/class/{id}', 'AjaxController@getClass');
Route::get('ajax/subject/{id}', 'AjaxController@getSubject');
Route::get('ajax/teacher/{id}', 'AjaxController@getTeacher');




//alummi
Route::get('/prodview/{id}','PageController@getAddAlummi');
Route::post('/prodview','PageController@postAddAlummi');
Route::get('/findNameBranch','PageController@findNameBranch');
Route::post('/postQuestionAlummi/{idUser}', 'PageController@postQuestionAlummi');

//student
Route::get('/prodview2/{id}','PageController@getAddStudent');
Route::post('/prodview2','PageController@postAddStudent');
Route::post('/postQuestionStudent/{idUser}', 'PageController@postQuestionStudent');

//teacher
Route::get('/prodview3/{id}','PageController@getAddTeacher');
Route::post('/prodview3','PageController@postAddTeacher');
Route::get('/findNameSubject','PageController@findNameSubject');
Route::post('/postQuestionTeacher/{idUser}', 'PageController@postQuestionTeacher');

//term
Route::get('/prodview4/{id}','PageController@getAddTerm');
Route::post('/prodview4','PageController@postAddTerm');
Route::post('/postQuestionTerm/{idUser}', 'PageController@postQuestionTerm');
//company
Route::get('/prodview5/{id}','PageController@getAddCompany');
Route::post('/prodview5','PageController@postAddCompany');
Route::post('/postQuestionCompany/{idUser}', 'PageController@postQuestionCompany');




Route::get('admin/dangnhap','MyController@getDangnhapAdmin');
Route::post('admin/dangnhap','MyController@postDangnhapAdmin');
Route::get('admin/logout','MyController@getDangxuatAdmin');




Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::get('/index','ABController@getdado');
	Route::group(['prefix'=>'user'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','MyController@getList');

		Route::get('edit/{id}','MyController@getEdit');
		Route::post('edit/{id}','MyController@postEdit');

		Route::get('add','MyController@getAdd');
		Route::post('add','MyController@postAdd');

		Route::get('delete/{id}','MyController@getDelete');
	});
	Route::group(['prefix'=>'ks'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('lista','ABController@getLista');
		Route::get('listb','ABController@getListb');
		Route::get('listc','ABController@getListc');
		Route::get('listd','ABController@getListd');
		Route::get('liste','ABController@getListe');


	});
	Route::group(['prefix'=>'theme'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','ThemeController@getList');

		Route::get('edit/{id}','ThemeController@getEdit');
		Route::post('edit/{id}','ThemeController@postEdit');

		Route::get('add','ThemeController@getAdd');
		Route::post('add','ThemeController@postAdd');

		Route::get('delete/{id}','ThemeController@getDelete');
	});
	Route::group(['prefix'=>'teacher'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','TeacherController@getList');

		Route::get('edit/{id}','TeacherController@getEdit');
		Route::post('edit/{id}','TeacherController@postEdit');

		Route::get('add','TeacherController@getAdd');
		Route::post('add','TeacherController@postAdd');

		Route::get('delete/{id}','TeacherController@getDelete');
	});
	Route::group(['prefix'=>'branch'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','BranchController@getList');

		Route::get('edit/{id}','BranchController@getEdit');
		Route::post('edit/{id}','BranchController@postEdit');

		Route::get('add','BranchController@getAdd');
		Route::post('add','BranchController@postAdd');

		Route::get('delete/{id}','BranchController@getDelete');
	});
	Route::group(['prefix'=>'student'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','StudentController@getList');

		Route::get('edit/{id}','StudentController@getEdit');
		Route::post('edit/{id}','StudentController@postEdit');

		Route::get('add','StudentController@getAdd');
		Route::post('add','StudentController@postAdd');

		Route::get('delete/{id}','StudentController@getDelete');
	});
	Route::group(['prefix'=>'subject'],function(){
		/*admin/type_sanpham/danhsach*/
		Route::get('list','SubjectController@getList');

		Route::get('edit/{id}','SubjectController@getEdit');
		Route::post('edit/{id}','SubjectController@postEdit');

		Route::get('add','SubjectController@getAdd');
		Route::post('add','SubjectController@postAdd');

		Route::get('delete/{id}','SubjectController@getDelete');
    });
    Route::group(['prefix'=>'faculty'],function(){
		Route::get('list','FacultyController@getList');

		Route::get('edit/{id}','FacultyController@getEdit');
		Route::post('edit/{id}','FacultyController@postEdit');

		Route::get('add','FacultyController@getAdd');
		Route::post('add','FacultyController@postAdd');

		Route::get('delete/{id}','FacultyController@getDelete');
	});
	Route::group(['prefix'=>'term'],function(){
		Route::get('list','TermController@getList');

		Route::get('edit/{id}','TermController@getEdit');
		Route::post('edit/{id}','TermController@postEdit');

		Route::get('add','TermController@getAdd');
		Route::post('add','TermController@postAdd');

		Route::get('delete/{id}','TermController@getDelete');
	});
	Route::group(['prefix'=>'class'],function(){
		Route::get('list','ClassController@getList');

		Route::get('edit/{id}','ClassController@getEdit');
		Route::post('edit/{id}','ClassController@postEdit');

		Route::get('add','ClassController@getAdd');
		Route::post('add','ClassController@postAdd');

		Route::get('delete/{id}','ClassController@getDelete');
	});
	Route::group(['prefix'=>'class'],function(){
		Route::get('list','ClassController@getList');

		Route::get('edit/{id}','ClassController@getEdit');
		Route::post('edit/{id}','ClassController@postEdit');

		Route::get('add','ClassController@getAdd');
		Route::post('add','ClassController@postAdd');

		Route::get('delete/{id}','ClassController@getDelete');
	});
	Route::group(['prefix'=>'survey'],function(){
		Route::get('list','SurveyController@getList');

		Route::get('edit/{id}','SurveyController@getEdit');
		Route::post('edit/{id}','SurveyController@postEdit');

		Route::get('add','SurveyController@getAdd');
		Route::post('add','SurveyController@postAdd');

		Route::get('delete/{id}','SurveyController@getDelete');
	});
	Route::group(['prefix'=>'question'],function(){
		Route::get('list','QuestionController@getList');

		Route::get('edit/{id}','QuestionController@getEdit');
		Route::post('edit/{id}','QuestionController@postEdit');

		Route::get('add','QuestionController@getAdd');
		Route::post('add','QuestionController@postAdd');

		Route::get('delete/{id}','QuestionController@getDelete');
	});
	Route::group(['prefix'=>'alummi'],function(){
		Route::get('list','AlummiController@getList');

		Route::get('edit/{id}','AlummiController@getEdit');
		Route::post('edit/{id}','AlummiController@postEdit');

		Route::get('add','AlummiController@getAdd');
		Route::post('add','AlummiController@postAdd');

		Route::get('delete/{id}','AlummiController@getDelete');
	});
	Route::group(['prefix'=>'company'],function(){
		Route::get('list','CompanyController@getList');

		Route::get('edit/{id}','CompanyController@getEdit');
		Route::post('edit/{id}','CompanyController@postEdit');

		Route::get('add','CompanyController@getAdd');
		Route::post('add','CompanyController@postAdd');

		Route::get('delete/{id}','CompanyController@getDelete');
	});	
	Route::group(['prefix'=>'personcompany'],function(){
		Route::get('list','PersonController@getList');

		Route::get('edit/{id}','PersonController@postEdit');

		Route::get('add','PersonController@getAdd');
		Route::post('add','PersonController@postAdd');

		Route::get('delete/{id}','PersonController@getDelete');
	});
	Route::group(['prefix'=>'studentclass'],function(){
		Route::get('list','StudentClassController@getList');

		Route::get('edit/{id}','StudentClassController@postEdit');

		Route::get('add','StudentClassController@getAdd');
		Route::post('add','StudentClassController@postAdd');

		Route::get('delete/{id}','StudentClassController@getDelete');
	});
	Route::group(['prefix'=>'teacherclass'],function(){
		Route::get('list','TeacherClassController@getList');

		Route::get('edit/{id}','TeacherClassController@postEdit');

		Route::get('add','TeacherClassController@getAdd');
		Route::post('add','TeacherClassController@postAdd');

		Route::get('delete/{id}','TeacherClassController@getDelete');
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('nganh/{vien}','AjaxClassController@getbranch');

	});
	Route::get('/export','ABController@export');
	Route::get('/thongke','ABController@getdado');
});



