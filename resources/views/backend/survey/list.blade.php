
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Đợt Khảo Sát</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã Đợt Khảo Sát</th>
              <th>Tên Chủ Đề</th>
              <th>Đợt Khảo Sát</th>
              <th>Người Khảo Sát</th>
              <th>Sửa</th>
              <th>Xóa</th>       
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $l)
            <tr>
              <td>{{$l->id}}</td>
              <td>{{$l->NameTheme}}</td>
              <td>{{$l->NameSurvey}}</td>
              <td>{{$l->type}}</td>
              <td><a href="admin/survey/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
              <td><a href="admin/survey/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
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