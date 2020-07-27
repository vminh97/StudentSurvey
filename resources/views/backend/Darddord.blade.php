@extends('backend.master')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống Kê</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng Sinh Viên Tham Gia Khảo Sát</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$student}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book-reader fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng Số Giáo Viên</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teacher}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2" >
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Cựu Sinh Viên</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$alummi}}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid #f63e71!important;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TỔNG SỐ ĐỢT THI</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$survey}}</div>
            </div>
            <div class="col-auto">
              <i class="fab fa-themeisle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 offset-xl-1 col-md-6 mb-4" style="margin-left: 136px;">
      <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid #ebf63e!important;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TỔNG SỐ CHỦ ĐỀ</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$theme}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 offset-xl-1 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid red">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TỔNG SỐ CÂU HỎI</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$question}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-question-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Top Sinh Viên gần nhất khảo sát</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã Sinh Viên</th>
                  <th>Tên Sinh Viên</th>
                  <th>Số điện thoại</th>    
                </tr>
              </thead>
              <tbody>
                @foreach ($price as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->NameStudent}}</td>
                    <td>{{$p->Phone}}</td>
                  </tr> 
                @endforeach   
              </tbody>
            </table>
          </div>
        </div>
      </div>

     

    </div>

    <div class="col-lg-6 mb-4">
    
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Top Giảng Viên gần nhất khảo sát</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã giảng viên</th>
                  <th>Tên giảng viên</th>
                  <th>Số điện thoại</th>    
                </tr>
              </thead>
              <tbody>
                @foreach ($topgv as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->NameTeacher}}</td>
                    <td>{{$p->Phone}}</td>
                  </tr> 
                @endforeach   
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 offset-2 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Top Cựu Sinh Viên gần nhất khảo sát</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã Cựu Sinh Viên</th>
                  <th>Tên Cựu sinh Viên</th>
                  <th>Số điện thoại</th>    
                </tr>
              </thead>
              <tbody>
                @foreach ($topcsv as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->NameAlummi}}</td>
                    <td>{{$p->Phone}}</td>
                  </tr> 
                @endforeach   
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection