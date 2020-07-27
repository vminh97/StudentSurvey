
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Cán Bộ Công Ty</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Cán Bộ Công Ty</th>
                <th>Tên Công Ty</th>
                <th>Họ Tên</th>
                <th>Ngày Sinh</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Công việc đảm nhiệm</th>
                <th>Sửa</th>
                <th>Xóa</th>       
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $l)
              <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->NameCompany}}</td>
                <td>{{$l->Name}}</td>
                <td>{{$l->DateBirth}}</td>
                <td>{{$l->Phone}}</td>
                <td>{{$l->Email}}</td>
                <td>{{$l->position}}</td>
                <td>{{$l->ResponsibleWork}}</td>
                <td><a href="admin/personcompany/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/personcompany/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
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