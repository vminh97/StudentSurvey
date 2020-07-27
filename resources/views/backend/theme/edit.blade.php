@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Chủ Đề</h3>
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
            <form action="admin/theme/edit/{{$type->id}}" method="POST">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                   
                    <label>Tên Chủ Đề</label>
                    <input class="form-control" name="NameTheme"  value="{{$type->NameTheme}}" placeholder="Nhập Tên Viện Đào Tạo">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection