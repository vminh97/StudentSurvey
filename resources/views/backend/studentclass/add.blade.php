@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Sinh Viên - Lớp Học Phần</h3>
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
            <form action="admin/studentclass/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Sinh Viên</label>
                    <select name="id_student" id="">
                        @foreach($sinhvien as $sv)
                             <option value="{{$sv->id}}">{{$sv->NameStudent}}</option>
                        @endforeach
                    </select> 
                </div>  
                <div class="form-group " >
                    <label for="inputState">lớp Học Phần</label>
                    <select name="id_class" id="">
                        @foreach($lop as $l)
                             <option value="{{$l->id}}">{{$l->NameClass}}</option>
                        @endforeach
                    </select> 
                </div>   
               
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection