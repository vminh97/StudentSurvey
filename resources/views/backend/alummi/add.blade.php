@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Cựu Sinh Viên</h3>
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
            <form action="admin/alummi/add" method="POST" enctype="multipart/form-data">
                
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group " >
                        <label for="inputState">Tên Ngành</label>
                        <select name="id_branch" id="">
                            @foreach($nganh as $n)
                                <option value="{{$n->id}}">{{$n->NameBranch}}</option>
                            @endforeach
                        </select> 
                    </div>   
                    <div class="form-group">   
                        <label >Họ Tên</label>
                        <input class="form-control" name="NameAlummi" placeholder="Nhập Họ Và Tên"   >
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input  type="date" name="DateBirth"    class="form-control" value="" required="required" title="">
                    </div>
                    <div class="form-group">   
                        <label >Số Điện Thoại</label>
                        <input class="form-control" name="Phone" placeholder="Nhập Số Điện Thoại"   >
                    </div>
                    <div class="form-group">   
                        <label >Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập Email"   >
                    </div>
                    <div class="form-group">   
                        <label >Việc Làm</label>
                        <select class="form-control" name="id_branch">
                            <option>Có<option>
                            <option>Không</option>
                        </select>
                    </div>
                    <div class="form-group " >
                        <label for="inputState">Tên công ty</label>
                        <select name="id_company" id="">
                            @foreach($congty as $ct)
                                <option value="{{$ct->id}}">{{$ct->NameCompany}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">   
                        <label >Địa Chỉ Công Ty</label>
                        <input class="form-control" name="AddressCompany" placeholder="Nhập Địa Chỉ Công Ty"   >
                    </div>
                    <div class="form-group">   
                        <label >Email</label>
                        <input class="form-control" name="workcv" placeholder="Nhập Công Ty"   >
                    </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection