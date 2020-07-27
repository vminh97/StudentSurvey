@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Câu Hỏi</h3>
        </div>
        <div class="col-md-8 offset-md-2">
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
            </div>
        @endif

        @if(session('thongbao'))
            <div class="alert alert-success">
               <p style="text-align: center">{{session('thongbao')}}</p> 
            </div>
        @endif
            <form action="admin/question/edit/{{$cauhoi->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Đợt Khảo Sát</label>
                    <select class="form-control" name="id_survey">
                        @foreach($dotks as $dks)
                        <option 
                            @if($cauhoi->id_survey == $dks->id)
                                {{'selected'}}
                            @endif
                            value="{{$dks->id}}">{{$dks->NameSurvey}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Câu Hỏi</label>
                <input class="form-control" name="NameTeacher" value="{{$cauhoi->NameQuestion}}">
                </div>  
                <div class="form-group">   
                    <label >Phương Án A</label>
                    <input class="form-control" name="PAA"  value="{{$cauhoi->PAA}}">
                </div>
                <div class="form-group">   
                    <label >Phương Án B</label>
                    <input class="form-control" name="PAB"  value="{{$cauhoi->PAB}}">
                </div>
                <div class="form-group">   
                    <label >Phương Án C</label>
                    <input class="form-control" name="PAC"  value="{{$cauhoi->PAC}}">
                </div>
                <div class="form-group">   
                    <label >Phương Án D</label>
                    <input class="form-control" name="PAD"  value="{{$cauhoi->PAD}}">
                </div>
                <div class="form-group">   
                    <label >Phương Án E</label>
                    <input class="form-control" name="PAE"  value="{{$cauhoi->PAE}}">
                </div>
                
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection