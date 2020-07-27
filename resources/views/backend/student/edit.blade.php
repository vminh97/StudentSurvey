@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Thông Tin Học Sinh</h3>
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
            <form action="admin/student/edit/{{$sinhvien->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Ngành Học</label>
                    <select class="form-control" name="id_subject">
                        @foreach($nganh as $n)
                        <option 
                            @if($sinhvien->id_branch == $n->id)
                                {{'selected'}}
                            @endif
                            value="{{$n->id}}">{{$n->NameBranch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Tên Sinh Viên</label>
                <input class="form-control" name="NameStudent" value="{{$sinhvien->NameStudent}}"   >
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input name="ngaysinh" type="date" name="DateBirth" value="{{$sinhvien->BirthDate}}"   class="form-control" value="" required="required" title="">
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone" value="{{$sinhvien->Phone}}"   >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email" value="{{$sinhvien->Email}}"   >
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection