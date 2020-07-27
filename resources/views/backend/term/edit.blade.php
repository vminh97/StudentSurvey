@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Sửa Học Phần</h3>
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
            <form action="admin/term/edit/{{$hocphan->id}}" method="POST" >            
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group ">
                    <label for="inputState">Tên Ngành Học</label>
                    <select class="form-control" name="id_branch">
                        @foreach($nganh as $n)
                        <option 
                            @if($hocphan->id_branch == $n->id)
                                {{'selected'}}
                            @endif
                            value="{{$n->id}}">{{$n->NameBranch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">   
                    <label >Tên Học Phần</label>
                <input class="form-control" name="NameTerm" value="{{$hocphan->NameTerm}}"  placeholder="Nhập Tên Học Phần">
                </div>  
                <div class="form-group">   
                    <label >Số Tín chỉ</label>
                    <input class="form-control" name="NumberCredit" value="{{$hocphan->NumberCredit}}" placeholder="Nhập Tên Giảng Viên">
                </div>
                <div class="form-group">   
                    <label >Lý Thuyết</label>
                    <input class="form-control" name="NumberTheory" value="{{$hocphan->NumberTheory}}"  placeholder="Nhập Tên Giảng Viên">
                </div>
                <div class="form-group">   
                    <label >Thực Hành</label>
                    <input class="form-control" name="NumberPractice" value="{{$hocphan->NumberPractice}}"   placeholder="Nhập Tên Giảng Viên">
                </div>
                <div class="form-group">   
                    <label >Bài Tập</label>
                    <input class="form-control" name="NumberExam" value="{{$hocphan->NumberExam}}"   placeholder="Nhập Tên Giảng Viên">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Sửa</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection