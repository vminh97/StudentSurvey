
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Ngành Học</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Ngành Học</th>
                <th>Tên Viện</th>
                <th>Tên Ngành Học</th>
                <th>Sửa</th>       
                <th>Xóa</th>  
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $l)
              <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->NameFaculty}}</td>
                <td>{{$l->NameBranch}}</td>
                <td><a href="admin/branch/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/branch/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
              </tr> 
              @endforeach
            </body>    
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection