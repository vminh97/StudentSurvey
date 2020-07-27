@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Lớp Học Phần</h3>
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
            <form action="admin/class/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Viện</label>
                    <select name="id_term" id="">
                        @foreach($hocphan as $hp)
                             <option value="{{$hp->id}}">{{$hp->NameTerm}}</option>
                        @endforeach
                    </select>    
                <div class="form-group">   
                    <label >Tên Lớp Học Phần</label>
                    <input class="form-control" name="NameClass"  placeholder="Nhập Tên Lớp Học Phần">
                </div>  
                <div class="form-group">   
                    <label >Học Kì</label>
                    <input class="form-control" name="Semester"  placeholder="Nhập Học Kì">
                </div>
                <div class="form-group">   
                    <label >Năm Học</label>
                    <input class="form-control" name="YearSchool"   placeholder="Nhập Học Kì">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection