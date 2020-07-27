
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Khoa Đào Tạo</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã Khoa</th>
            <th>Tên Khoa</th>
            <th>Sửa</th>
            <th>Xóa</th>       
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $l)
          <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->NameTheme}}</td>
            <td><a href="admin/theme/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
            <td><a href="admin/theme/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
          </tr> 
          @endforeach
        </tbody>  
      </table>
    </div>
  </div>
</div>
@endsection