@extends('frontend.master')
@section('content')
<div class="tt">  
    <div class="than2">
        <div class="container">
            <div class="than4" style="background: white">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="title5">
                            <h3 class="title5">Khảo Sát Doanh Nghiệp</h3>
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
                        <form action="prodview5" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />  
                            <div class="col-md-12 col-xs-12 ">
                                <div class="title6">
                                    <div class="row">
                                        <div class="col-md-3 offset-1 col-xs-12 ">
                                            <label class="v1" for="inputState">Họ Và Tên</label>
                                            <span>
                                                <input  class="form-control" name="Name"   > 
                                            </span>
                                        </div>
                                        <div class="col-md-3 offset-1 col-xs-12 ">
                                            <label class="v1" for="inputState">Số Điện Thoại</label>
                                            <span>
                                                <input class="form-control" name="Phone" > 
                                            </span>
                                        </div>
                                        <div class="col-md-2 offset-1 col-xs-12 ">
                                            <label class="v1" for="inputState">Vị trí đảm nhiệm</label>
                                            <span>
                                                <input class="form-control" name="ResponsibleWork" > 
                                            </span>
                                        </div>   
                                    </div>   
                                </div>                                   
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="title6">
                                    <div class="row">
                                        <div class="col-md-2 offset-1 col-xs-12 ">
                                            <label class="v1" for="inputState">Vị trí</label>
                                            <span>
                                                <input  class="form-control" name="position" > 
                                            </span>
                                        </div>
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
                                            <label  style="margin-left:100px;margin-top: 7px;" for="inputState">Tên Công ty </label><br>
                                            <select style="width: 300px;margin-left: 15px;" class="company" id="company" name="id_company">                   
                                                @foreach($proda  as $ty)
                                                    <option value="{{$ty->id}}">{{$ty->NameCompany}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                            </div>
                            <div class="col-md-12 col-xs-12"  >
                                <div class="row">
                                    <div class="col-md-4 offset-5 col-xs-12 ">                        
                                        <div class="form-group" >
                                            <label class="v1" for="inputState">Đợt Khảo Sát</label>
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
</div>
@endsection
