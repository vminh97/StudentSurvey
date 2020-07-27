@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Công Ty</h3>
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
            <form action="admin/company/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />    
                <div class="form-group">   
                    <label >Tên Công Ty</label>
                    <input class="form-control" name="NameCompany" placeholder="Nhập Tên Công Ty" >
                </div>
                <div class="form-group">   
                    <label >Người Đại Diện</label>
                    <input class="form-control" name="NameOne" placeholder="Nhập Tên Người Đại Diện"  >
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input  class="form-control"  name="Address" placeholder="Nhập Tên Công Ty"   >
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone" placeholder="Nhập Số Điện Thoại"    >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email" placeholder="Nhập Email"    >
                </div>
                <select name="" id="">
                    <option value="Loại"> Có</option>
                    <option value="Loại"> Không</option>
                </select>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection