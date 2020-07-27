@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Học Phần</h3>
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
            <form action="admin/term/add" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group " >
                    <label for="inputState">Tên Học Phần</label>
                    <select name="id_branch" id="">
                        @foreach($nganh as $n)
                             <option value="{{$n->id}}">{{$n->NameBranch}}</option>
                        @endforeach
                    </select>
                </div>    
                <div class="form-group">   
                    <label >Tên Học Phần</label>
                    <input class="form-control" name="NameTerm"  placeholder="Nhập Tên Học Phần">
                </div>  
                <div class="form-group">   
                    <label >Số Tín chỉ</label>
                    <input class="form-control" name="NumberCredit"  placeholder="Nhập số tín chỉ">
                </div>
                <div class="form-group">   
                    <label >Lý Thuyết</label>
                    <input class="form-control" name="NumberTheory"  placeholder="Nhập số tín chỉ lý thuyết">
                </div>
                <div class="form-group">   
                    <label >Thực Hành</label>
                    <input class="form-control" name="NumberPractice"   placeholder="Nhập số tín chỉ thực hành">
                </div>
                <div class="form-group">   
                    <label >Bài Tập</label>
                    <input class="form-control" name="NumberExam"   placeholder="Nhập số tín chỉ bài tập">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
        
    </div>
</div>
       
@endsection