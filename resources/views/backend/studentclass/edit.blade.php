@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Bảng Sinh Viên - Học Phần</h3>
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
            <form action="admin/teacher/edit/{{$svlop->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Sinh Viên</label>
                    <select class="form-control" name="id_subject">
                        @foreach($sinhvien as $sv)
                        <option 
                            @if($svlop->id_student == $sv->id)
                                {{'selected'}}
                            @endif
                            value="{{$sv->id}}">{{$sv->NameStudent}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputState">Tên Lớp Học Phần</label>
                    <select class="form-control" name="id_subject">
                        @foreach($lop as $l)
                        <option 
                            @if($svlop->id_class == $l->id)
                                {{'selected'}}
                            @endif
                            value="{{$l->id}}">{{$l->NameClass}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection