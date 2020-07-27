@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Khoa Đào Tạo</h3>
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
            <form action="admin/survey/edit/{{$dotks->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Chủ Đề</label>
                    <select class="form-control" name="id_theme">
                        @foreach($chude as $cd)
                        <option 
                            @if($dotks->id_theme == $cd->id)
                                {{'selected'}}
                            @endif
                            value="{{$cd->id}}">{{$cd->NameTheme}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Tên Đợt Khảo Sát</label>
                    <input class="form-control" name="NameSurvey" value="{{$dotks->NameSurvey}}"   >
                </div>
                <div class="form-group">   
                    <label >Tên Đợt Khảo Sát</label>
                    <input class="form-control" name="type" value="{{$dotks->type}}"   >
                </div>
                
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection