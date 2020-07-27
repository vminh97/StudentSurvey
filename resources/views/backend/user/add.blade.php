@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center">Thêm Admin</h3>
        </div>
        <div class="col-md-8 offset-md-2">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}} <br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                               <p style="text-align: center">{{session('thongbao')}}</p> 
                            </div>
                        @endif
            <form action="admin/user/add" method="POST">         
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label for="inputPassword4">Họ Tên</label>
                    <input class="form-control" name="full_name" placeholder="Nhập Tên admin">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Email</label>
                    <input class="form-control" name="email" placeholder="Nhập Email">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">PassWord</label>
                    <input class="form-control" name="password" placeholder="Nhập PassWord">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Nhập Lại PassWord</label>
                    <input class="form-control" name="remember_token" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Phone</label>
                    <input class="form-control" name="phone" placeholder="Nhập Số Điện Thoại">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Địa Chỉ</label>
                    <input class="form-control" name="address" placeholder="Nhập Địa Chỉ">
                </div>
                <button type="submit" class="btn btn-lg btn-danger" style="margin-left: 295px;
                margin-bottom: 51px;">Thêm</button>
            </form>
        </div>
    </div>
</div>
@if(isset($user_login))
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user_login->full_name}}</span>
  </a>
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="admin/user/edit/{{Auth::check()->id}}">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      Hồ Sơ
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="admin/logout" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
       Đăng Xuất
    </a>
  </div>
</li>
@endif
@endsection