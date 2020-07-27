
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Công Ty</h6>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-8">
          <label style="color: #4e73df !important;
          font-weight: 700 !important;
          font-size: 20px;
          margin-right: 15px;">Tìm kiếm</label>
        <span><input type="text" id="myInput" onkeyup="clFunction()" title="Type in a name"></span>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã Công Ty</th>
            <th>Tên Công Ty</th>
            <th>Người Đại Diện</th>
            <th>Địa Chỉ Công Ty</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Loại</th>
            <th>Sửa</th>
            <th>Xóa</th>       
          </tr>
        </thead>
        <tfoot>
          @foreach ($list as $l)
          <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->NameCompany}}</td>
            <td>{{$l->NameOne}}</td>
            <td>{{$l->Address}}</td>
            <td>{{$l->Phone}}</td>
            <td>{{$l->Email}}</td>
            <td>{{$l->Flag}}</td>
            <td><a href="admin/company/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
            <td><a href="admin/company/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
          </tr> 
          @endforeach
        </tfoot>  
      </table>
    </div>
  </div>
</div>
@endsection