
@extends('backend.master')
@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng Câu Hỏi</h6>
  </div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã Câu Hỏi</th>
                <th>Tên chủ đề </th>
                <th>Tên Đợt Khảo Sát</th>
                <th>Câu Hỏi</th>
                <th>Đáp Án A</th>
                <th>Đáp Án B</th>
                <th>Đáp Án C</th>
                <th>Đáp Án D</th>
                <th>Đáp Án E</th>
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
                <td>{{$l->NameQuestion}}</td>
                <td>{{$l->PAA}}</td>
                <td>{{$l->PAB}}</td>
                <td>{{$l->PAC}}</td>
                <td>{{$l->PAD}}</td>
                <td>{{$l->PAE}}</td>
                <td><a href="admin/question/edit/{{$l->id}}"><i class="fas fa-edit"></i> Sửa</a></td>
                <td><a href="admin/question/delete/{{$l->id}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
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