
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3" style="margin-bottom: 20px">
    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Cựu Sinh Viên</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Cựu Sinh Viên</th>
                <th>Tên Ngành</th>
                <th>Họ Tên</th>
                <th>Khóa Học</th>
                <th>Ngày Sinh</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Việc Làm</th>
                <th>Tên Công Ty</th>
                <th>Nơi Công Tác</th>
                <th>Chức Vụ</th>
                <th>Sửa</th>
                <th>Xóa</th>       
              </tr>
            </thead>
            <tfoot>
              @foreach ($list as $l)
              <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->NameBranch}}</td>
                <td>{{$l->NameAlummi}}</td>
                <td>{{$l->Course}}</td>
                <td>{{$l->DateBirth}}</td>
                <td>{{$l->Phone}}</td>
                <td>{{$l->Email}}</td>
                <td>{{$l->Work}}</td>
                <td>{{$l->NameCompany}}</td>
                <td>{{$l->AddressCompany}}</td>
                <td>{{$l->Workcv}}</td>
                <td><a href="admin/alummi/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/alummi/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
              </tr> 
              @endforeach
            </tfoot>     
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection