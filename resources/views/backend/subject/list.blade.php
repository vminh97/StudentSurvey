
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Bộ Môn</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Bộ Môn</th>
                <th>Mã Viện</th>
                <th>Tên Bộ Môn</th>
                <th>Sửa</th>
                <th>Xóa</th>       
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $l)
              <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->NameFaculty}}</td>                          
                <td>{{$l->NameSubject}}</td>
                <td><a href="admin/subject/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/subject/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
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