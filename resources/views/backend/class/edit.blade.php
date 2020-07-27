@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Lớp Học Phần</h3>
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
            <form action="admin/class/edit/{{$lop->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Học Phần</label>
                    <select class="form-control" name="id_term">
                        @foreach($hocphan as $hp)
                        <option 
                            @if($l->id_term == $hp->id)
                                {{'selected'}}
                            @endif
                            value="{{$hp->id}}">{{$hp->NameTerm}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Tên Lớp Học Phần</label>
                <input class="form-control" name="NameTerm" value="{{$hocphan->NameTerm}}"   >
                </div>
                <div class="form-group">   
                    <label >Học Kì </label>
                    <input class="form-control" name="Semester" value="{{$hocphan->Semester}}"   >
                </div>
                <div class="form-group">   
                    <label >Năm Học</label>
                    <input class="form-control" name="YearSchool" value="{{$hocphan->YearSchool}}"   >
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection