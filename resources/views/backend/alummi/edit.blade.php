@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Bảng Cựu Sinh Viên</h3>
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
            <form action="admin/teacher/edit/{{$cuusv->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Ngành Học</label>
                    <select class="form-control" name="id_branch">
                        @foreach($nganh as $n)
                        <option 
                            @if($cuusv->id_branch == $n->id)
                                {{'selected'}}
                            @endif
                            value="{{$n->id}}">{{$n->NameBranch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Họ Tên</label>
                <input class="form-control" name="NameAlummi" value="{{$cuusv->NameAlummi}}"   >
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input  type="date" name="DateBirth" value="{{$cuusv->BirthDate}}"   class="form-control" value="" required="required" title="">
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone" value="{{$cuusv->Phone}}"   >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email" value="{{$cuusv->Email}}"   >
                </div>
                <div class="form-group">   
                    <label >Việc Làm</label>
                    <select class="form-control" name="id_branch">
                        <option>Có<option>
                        <option>Không</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputState">Tên Công Ty</label>
                    <select class="form-control" name="id_branch">
                        @foreach($company as $c)
                        <option 
                            @if($cuusv->id_company == $c->id)
                                {{'selected'}}
                            @endif
                            value="{{$c->id}}">{{$c->NameCompany}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Địa Chỉ Công Ty</label>
                    <input class="form-control" name="AddressCompany" value="{{$cuusv->AddressCompany}}"   >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="workcv" value="{{$cuusv->wordcv}}"   >
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection