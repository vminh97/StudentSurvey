@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Câu Hỏi</h3>
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
            <form action="admin/question/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Đợt Khảo Sát</label>
                    <select name="id_survey" id="">
                        @foreach($dotks as $dks)
                    <option value="{{$dks->id}}">{{$dks->NameSurvey }} - {{$dks->NameTheme}}</option>
                        @endforeach
                    </select>  
                </div>  
                <div class="form-group">   
                    <label >Câu Hỏi</label>
                    <input class="form-control" name="NameQuestion"  placeholder="Nhập Câu Hỏi">
                </div>  
                <div class="form-group">   
                    <label >Phương Án A</label>
                    <input class="form-control" name="PAA"  placeholder="Nhập Phương Án A">
                </div>
                <div class="form-group">   
                    <label >Phương Án B</label>
                    <input class="form-control" name="PAB"  placeholder="Nhập Phương Án B">
                </div>
                <div class="form-group">   
                    <label >Phương Án C</label>
                    <input class="form-control" name="PAC"  placeholder="Nhập Phương Án C">
                </div>
                <div class="form-group">   
                    <label >Phương Án D</label>
                    <input class="form-control" name="PAD"  placeholder="Nhập Phương Án D">
                </div>
                <div class="form-group">   
                    <label >Phương Án E</label>
                    <input class="form-control" name="PAE"  placeholder="Nhập Phương Án E">
                </div>   
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection