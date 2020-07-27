@extends('frontend.master')
@section('content')
<div class="tt">  
    <div class="than2">
        <div class="container">
            <div class="than4" style="background: white">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="title5">
                            <h3 class="title5">Khảo Sát Sinh Viên</h3>
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
                    <form action="prodview2" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />  
                        <div class="col-md-12 col-xs-12 ">
                            <div class="title6">
                                <div class="row">
                                    <div class="col-md-5 offset-1 col-xs-12 ">
                                        <label class="v1" for="inputState">Họ Và Tên</label>
                                        <span>
                                            <input  class="form-control" name="NameStudent"   > 
                                        </span>
                                    </div>
                                    <div class="col-md-4 offset-1 col-xs-12 ">
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
                                    <div class="col-md-3 offset-1 col-xs-12 ">
                                        <label class="v1" for="inputState">Năm Sinh</label>
                                        <span>
                                            <input  type="date" name="DateBirth"  class="form-control" value="" required="required" title="">
                                        </span>
                                    </div> 
                                    <div class="col-md-3 offset-1 col-xs-12 ">
                                        <label class="v1" for="inputState">Email</label>
                                        <span>
                                            <input  class="form-control" name="Email" > 
                                        </span>
                                    </div>   
                                </div>   
                            </div>                                                    
                    
                        <div class="col-md-12 col-xs-12 " style="margin-top:25px">
                                <div class="row">
                                        <label  style="margin-left:100px;margin-top: 7px;" for="inputState">Viện Đào Tạo: </label><br>
                                        <select style="width: 300px;margin-left: 15px;" class="faculty" id="id_faculty" name="id_faculty">                   
                                            <option value="0" disabled="true" selected="true">Viện Đào Tạo</option>
                                            @foreach($prod as $cat)
                                            <option value="{{$cat->id}}">{{$cat->NameFaculty}}</option>
                                            @endforeach
                                        </select>
                                        <label  style="margin-left:70px;margin-top: 7px;" for="inputState">Ngành Đào Tạo </label><br>    
                                        <select style="width: 300px;margin-left: 15px;"class="branch" name="id_branch"> 
                                        </select>
                                </div>
                        </div>
                        <div class="col-md-12 col-xs-12"  >
                            <div class="row">
                                <div class="col-md-4 offset-5 col-xs-12 ">                        
                                    <div class="form-group" >
                                        <label class="v1" for="inputState">Chọn Đợt Khảo Sát</label>
                                        <select name="survey" id="survey " >
                                            <option style="width: 250px;
                                            height: 40px;" value="{{$dotthi->id}}">{{$dotthi->NameSurvey}}</option>
                                        </select>
                                    </div>                  
                                </div>    
                        </div>
                        <div class="col-md-12 col-xs-12" style="margin-top:25px">
                            <button type="submit" class="btn btn-primary gh"  >Bắt đầu khảo sát</button>
                        </div>
                   </form>
                </div>
            </div>  
        </div>       
    </div>
</div>
@endsection
