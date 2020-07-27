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
            <form action="admin/user/edit/{{$nguoisd->id}}" method="POST">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">   
                    <label>Tên Admin</label>
                    <input class="form-control" name="full_name"  value="{{$nguoisd->full_name}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Email</label>
                    <input class="form-control" name="email" value="{{$nguoisd->email}}" >
                </div>
                <div class="form-group">
                    <label for="inputPassword4">PassWord</label>
                    <input class="form-control" name="password" value="{{$nguoisd->password}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Nhập Lại PassWord</label>
                    <input class="form-control" name="remember_token" value="{{$nguoisd->remember_token}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Phone</label>
                    <input class="form-control" name="phone" value="{{$nguoisd->Phone}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Địa Chỉ</label>
                    <input class="form-control" name="address" value="{{$nguoisd->Address}}">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection