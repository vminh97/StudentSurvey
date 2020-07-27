@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Đợt Khảo Sát</h3>
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
            <form action="admin/survey/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Chủ Đề</label>
                    <select name="id_theme" id="">
                        @foreach($chude as $cd)
                             <option value="{{$cd->id}}">{{$cd->NameTheme  }}</option>
                        @endforeach
                    </select>    
                <div class="form-group">   
                    <label >Tên Chủ Đề</label>
                    <input class="form-control" name="NameSurvey"  placeholder="Nhập Đợt Khảo Sát ">
                </div>  
                <div class="form-group">   
                    <label >Người Khảo sát</label>
                    <input class="form-control" name="type"  placeholder="Nhập đối tượng khảo sát ">
                </div>  
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection