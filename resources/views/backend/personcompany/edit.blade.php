@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Bảng Cán Bộ Công Ty</h3>
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
            <form action="admin/personcompany/edit/{{$nguoi->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Bộ Môn</label>
                    <select class="form-control" name="id_company">
                        @foreach($congty as $c)
                        <option 
                            @if($nguoi->id_company == $c->id)
                                {{'selected'}}
                            @endif
                            value="{{$c->id}}">{{$c->NameCompany}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Tên Cán Bộ</label>
                <input class="form-control" name="Name" value="{{$nguoi->Name}}"   >
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input  type="date" name="DateBirth" value="{{$nguoi->BirthDate}}"   class="form-control" value="" required="required" title="">
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone" value="{{$nguoi->Phone}}"   >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email" value="{{$nguoi->Email}}"   >
                </div>
                <div class="form-group">   
                    <label >Chức vụ</label>
                    <input class="form-control" name="position" value="{{$nguoi->position}}"   >
                </div>
                <div class="form-group">   
                    <label >Công việc đảm nhiệm</label>
                    <input class="form-control" name="	ResponsibleWork" value="{{$nguoi->ResponsibleWork}}"   >
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection