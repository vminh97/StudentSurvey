<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khảo Sát Trực Tuyến</title>
    <base href="{{asset('')}}">
    {{-- <link rel="stylesheet" href="isset/fronted/boostrap/bootstrap.js">
    <link rel="stylesheet" href="isset/fronted/boostrap/bootstrap.min.js"> --}}
    <link rel="stylesheet" type="text/css" href="isset/fronted/boostrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="isset/fronted/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="isset/fronted/fonts/css/fontawesome.css">
    <link rel="stylesheet" href="isset/fronted/fonts/css/fontawesome.min.css">
    {{-- <link rel="stylesheet" href="isset/fronted/fonts/js/fontawesome.js">
    <link rel="stylesheet" href="isset/fronted/fonts/js/fontawesome.min.js"> --}}
    <link rel="stylesheet" title="style" href="isset/fronted/css/fend.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	
		<div class="toplogin">
			<img src="isset/fronted/image/b1.png" class="ban "alt="">
        </div>
        <div class="than1">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary ef">
                <a class="navbar-brand" href="/trang-chu">Trang chủ</i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="isset/fronted/image/edit-profile.png" alt=""> Khảo Sát
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/sv">Sinh Viên</a>
                          <a class="dropdown-item" href="/gv">Giảng Viên</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="/csv">Cựu Sinh Viên</a>
                          <a class="dropdown-item" href="/ct">Doanh Nghiệp</a>
                        </div>
                    </li>
                    <a class="nav-item nav-link" href="/gioi-thieu">Giới Thiệu</a>  
                    <a class="nav-item nav-link" href="/huong-dan">Hướng Dẫn</a>   
                </div>
            </nav>
        </div>
		         @yield('content')
        @include('frontend.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        //load branch
        $(document).ready(function(){
    
        $(document).on('change','.faculty',function(){
              console.log("hmm its change");
   
          var cat_id=$(this).val();
          console.log(cat_id);
          var div=$(this).parent();
   
          var op=" ";
   
          $.ajax({
            type:'get',
            url:'{!!URL::to('findNameBranch')!!}',
            data:{'id':cat_id},
            success:function(data){
              // console.log('success');
   
              // console.log(data);
   
              // console.log(data.length);
              op+='<option value="0" selected disabled> Tên Ngành Học</option>';
              for(var i=0;i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].NameBranch+'</option>';
              }
   
              div.find('.branch').html(" ");
              div.find('.branch').append(op);
            },
            error:function(){
   
            }
          });
        });
       
        });
        //load subject
        $(document).ready(function(){
    
        $(document).on('change','.faculty',function(){
              console.log("hmm its change");

          var cat_id=$(this).val();
          // console.log(cat_id);
          var div=$(this).parent();

          var op=" ";

          $.ajax({
            type:'get',
            url:'{!!URL::to('findNameSubject')!!}',
            data:{'id':cat_id},
            success:function(data){
              // console.log('success');

              // console.log(data);

              // console.log(data.length);
              op+='<option value="0" selected disabled> Tên Bộ Môn</option>';
              for(var i=0;i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].NameSubject+'</option>';
              }

              div.find('.subject').html(" ");
              div.find('.subject').append(op);
            },
            error:function(){

            }
          });
        });
   
        });
        
        function myFunction() {
         alert(" Bạn đã khảo sát thành công");
        }
    </script>
</body>
</html>
