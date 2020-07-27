
@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bảng đáp án khảo sát cực sinh viên</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã Đáp án</th>
            <td>Tên Đợt thi</td>
            <th>Tên cựu sinh viên</th>
            <th>Tên câu hỏi</th>
            <th>Đáp án</th>      
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $l)
          <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->NameSurvey}}</td>
            <td>{{$l->NameAlummi}}</td>                          
            <td>{{$l->NameQuestion}}</td>
            <td>{{$l->answer}}</td>
          </tr> 
          @endforeach
        </tbody>
       
      </table>
    </div>
  </div>
</div>
@endsection