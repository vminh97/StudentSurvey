@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Bảng Công Ty</h3>
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
            <form action="admin/teacher/edit/{{$company->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">   
                    <label >Tên Công Ty</label>
                    <input class="form-control" name="NameCompany" value="{{$company->NameCompany}}"   >
                </div>
                <div class="form-group">   
                    <label >Người Đại Diện</label>
                    <input class="form-control" name="NameOne" value="{{$company->NameOne}}"   >
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input name="ngaysinh" type="date" name="Address" value="{{$company->Address}}"   class="form-control" value="" required="required" title="">
                </div>
                <div class="form-group">   
                    <label >Số Điện Thoại</label>
                    <input class="form-control" name="Phone" value="{{$giaovien->Phone}}"   >
                </div>
                <div class="form-group">   
                    <label >Email</label>
                    <input class="form-control" name="Email" value="{{$giaovien->Email}}"   >
                </div>
                <select name="" id="">
                    <option value="Loại"> Có</option>
                    <option value="Loại"> Không</option>
                </select>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection