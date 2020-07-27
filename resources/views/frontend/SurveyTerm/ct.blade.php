@extends('frontend.master')
@section('content')
<div class="tt">  
    <div class="than2">
        <div class="container">
            <div class="than4" style="background: white">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="title5">
                            <h3 class="title5">Khảo Sát Sinh Viên Học Phần</h3>
                        </div>                
                    </div>
                    @if(count($errors)>0)
						<div class="alert alert-danger" style="margin-left: 445px;
                        width: 300px;">
							@foreach($errors->all() as $err)
							<p style="text-align:center">{{$err}} <br></p>
							@endforeach
						</div>
					@endif
                    <div class="col-md-12">
                        <form action="prodview4" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12 col-xs-12 ">
                                <div class="title6">
                                    <div class="row">
                                        <div class="col-md-5 offset-1 col-xs-12 " >
                                            <label class="v1" for="inputState">Họ Và Tên</label>
                                            <span>
                                                <input  class="form-control" name="NameStudent"   > 
                                            </span>
                                        </div>
                                        <div class="col-md-4 offset-1 col-xs-12 " >
                                            <label class="v1" for="inputState">Số Điện Thoại</label>
                                            <span>
                                                <input class="form-control" name="Phone" > 
                                            </span>
                                        </div>   
                                    </div>   
                                </div>                                   
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="title6">
                                    <div class="row">
                                        <div class="col-md-3 offset-1 col-xs-12 " style="margin-top: 9px;">
                                            <label class="v1" for="inputState">Ngày Sinh</label>
                                            <span>
                                                <input  type="date" name="DateBirth"  class="form-control" value="" required="required" title="">
                                            </span>
                                        </div> 
                                        <div class="col-md-3  col-xs-12 " style="margin-top: 9px;">
                                            <label class="v1" for="inputState">Email</label>
                                            <span>
                                                <input  class="form-control" name="Email" > 
                                            </span>
                                        </div>
                                        <div class="col-md-4  col-xs-12 ">
                                            <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Viện Đào Tạo </label><br>
                                            <select style="width: 300px;margin-left: 15px;height:40px" class="" id="id_faculty" name="id_faculty">                   
                                                <option value="0" disabled="true" selected="true">Viện Đào Tạo</option>
                                                @foreach($prod as $cat)
                                                <option value="{{$cat->id}}">{{$cat->NameFaculty}}</option>
                                                @endforeach
                                            </select>
                                        </div>   
                                    </div>   
                                </div>                                                    
                            </div>
                            <div class="col-md-12 col-xs-12 " >
                                <div class="row">
                                     
                                    <div class="col-md-3  col-xs-12 " style="margin-left: 75px">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Ngành Đào tạo </label><br>    
                                        <select style="width: 200px;margin-left: 15px;height:40px" id="branch" class="branch" name="branch"> 
                                        </select>
                                    </div>
                                    <div class="col-md-4  col-xs-12 ">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Tên Học Phần</label><br>    
                                        <select style="width: 300px;margin-left: 15px;height:40px" id="term" class="term" name="term"> 
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-xs-12 ">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Tên Lớp Học</label><br>    
                                        <select style="width: 300px;margin-left: 15px;height:40px" id="class" class="class" name="class"> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 " >
                                <div class="row">
                                    <div class="col-md-3  col-xs-12 " style="margin-left: 75px">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Bộ Môn</label><br>    
                                        <select style="width: 200px;margin-left: 15px;height:40px" class="subject" id="subject" name="subject"> 
                                        </select>
                                    </div>
                                    <div class="col-md-4  col-xs-12 ">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Giảng viên</label><br>    
                                        <select style="width: 300px;margin-left: 15px;height:40px" id="teacher" class="teacher" name="teacher"> 
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-xs-12 ">
                                        <label  style="margin-left: 15px;margin-top: 7px;" for="inputState">Đợt Khảo Sát </label><br>
                                            <select style="width: 300px;margin-left: 15px;height:40px" class="survey" id="survey" name="survey">                           
                                                <option value="{{$dotthi->id}}">{{$dotthi->NameSurvey}}</option>
                                            </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12" style="margin-top:25px">
                               <input type="submit" class="btn btn-primary gh" value="Bắt đầu khảo sát">
                            </div>
                       </form>
                    </div>
                   
                </div>
            </div>  
        </div>       
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#id_faculty').change(function(){
            var id_faculty =   $('#id_faculty').val();
            $.get("ajax/branch/"+id_faculty, function(data){
				$("#branch").html(data);
			});

            $.get("ajax/subject/"+id_faculty, function(data){
				$("#subject").html(data);
			});
        });
        
        $('#branch').change(function(){
            var id_branch =   $('#branch').val()
            $.get("ajax/term/"+id_branch, function(data){
				$("#term").html(data);
			});
        });

        $('#term').change(function(){
            var id_branch =   $('#term').val();
            $.get("ajax/class/"+id_branch, function(data){
				$("#class").html(data);
			});
        });

        $('#subject').change(function(){
            var id_branch =   $('#subject').val();
            $.get("ajax/teacher/"+id_branch, function(data){
				$("#teacher").html(data);
			});
        });

    });
</script>
@endsection
