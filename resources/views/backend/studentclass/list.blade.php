
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Bảng Sinh Viên Học Phần</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Sinh Viên</th>
                <th>Tên Ngành Học</th>
                <th>Họ Tên</th>
                <th>Ngày Sinh</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Sửa</th>
                <th>Xóa</th>       
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $l)
              <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->NameBranch}}</td>
                <td>{{$l->NameStudent}}</td>
                <td>{{$l->DateBirth}}</td>
                <td>{{$l->Phone}}</td>
                <td>{{$l->Email}}</td>
                <td><a href="admin/studentclass/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/studentclass/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
              </tr> 
              @endforeach   
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection