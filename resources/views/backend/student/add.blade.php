@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Sinh Viên</h3>
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
            <form action="admin/student/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Ngành Học</label>
                    <select name="id_branch" id="">
                        @foreach($nganh as $n)
                             <option value="{{$n->id}}">{{$n->NameBranch}}</option>
                        @endforeach
                    </select>    
                <div class="form-group">   
                    <label >Tên Sinh Viên</label>
                    <input class="form-control" name="NameStudent"  placeholder="Nhập Tên Sinh Viên">
                </div>  
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input  type="date" name="DateBirth" id="ngaysinh-add" class="form-control" value="" required="required" title="">
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone"  placeholder="Nhập Số Điện Thoại">
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email"   placeholder="Nhập Email">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection