@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Cán Bộ Công Ty</h3>
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
            <form action="admin/person/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Công Ty</label>
                    <select name="id_company" id="">
                        @foreach($congty as $c)
                             <option value="{{$c->id}}">{{$c->NameCompany}}</option>
                        @endforeach
                    </select>    
                    <div class="form-group">   
                        <label >Tên Cán Bộ</label>
                    <input class="form-control" name="Name" placeholder="Nhập Tên Cán Bộ"   >
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input  type="date" name="DateBirth"  class="form-control" value="" required="required" title="">
                    </div>
                    <div class="form-group">   
                        <label >Số Điện Thoại</label>
                        <input class="form-control" name="Phone"  placeholder="Nhập Số Điện Thoại" >
                    </div>
                    <div class="form-group">   
                        <label >Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập Email"   >
                    </div>
                    <div class="form-group">   
                        <label >Chức vụ</label>
                        <input class="form-control" name="position"  placeholder="Nhập Chức Vụ"  >
                    </div>
                    <div class="form-group">   
                        <label >Công việc đảm nhiệm</label>
                        <input class="form-control" name="	ResponsibleWork"  placeholder="Nhập Công Việc Đảm Nhận"   >
                    </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection