
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Giáo Viên Học Phần</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã Giảng Viên</th>
            <th>Tên Bộ Môn</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Sửa</th>
            <th>Xóa</th>       
          </tr>
        </thead>
        <tfoot>
          @foreach ($list as $l)
          <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->NameSubject}}</td>
            <td>{{$l->NameTeacher}}</td>
            <td>{{$l->DateBirth}}</td>
            <td>{{$l->Phone}}</td>
            <td>{{$l->Email}}</td>
            <td><a href="admin/teacher/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
            <td><a href="admin/teacher/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
          </tr> 
          @endforeach
        </tfoot>  
      </table>
    </div>
  </div>
</div>
@endsection