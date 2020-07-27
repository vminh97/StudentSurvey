
@extends('frontend.master')
@section('content')
<div class="idex" style="margin-top:20px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" style="background-color: #007bff;" role="alert">
                   <h2 class="m1">HỆ THỐNG KHẢO SÁT CÁC BÊN LIÊN QUAN CHO TRƯỜNG ĐẠI HỌC</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row t4">
                    <div class="col-md-12 "   style="border: 1px solid #cacaca;margin-left: 0px;"   >
                        <div class="row ">
                            <div class="col-md-12">
                                <h2 class="l6"><i class="fa fa-briefcase"> Danh Sách Khảo sát Sinh Viên</i></h2>
                            </div>
                            <div class="col-md-12">
                                @foreach ($kssv as $ks)
                                    <div class=" col-md-10 offset-md-1 ">
                                        <div class="t3">
                                            <div class="row ">
                                                <div class="col-md-2 offset-md-1 t1">
                                                <img class="l5" src="isset/fronted/image/tb.png" alt=""> 
                                                </div>                                          
                                                <div class="col-md-8 t2 ">    
                                                    <b>{{$ks->NameTheme}}</b><br>
                                                <a class="n4" href="/prodview2/{{$ks->id}}">Thông báo về khảo sát {{$ks->NameSurvey}}</a>                               
                                                </div> 
                                                <div style="margin-top:-15px">
                                                    <img style="margin-left: 730px" src="isset/fronted/image/user.png" alt="">
                                                    <b style="margin-left: 3px;">{{$ks->type}} </b>      
                                                </div>                                     
                                            </div> 
                                        </div>  
                                    </div>
                                @endforeach
                                
                                            {{-- {{!! $ksall->render() !!}} --}}
                                
                            </div>         
                        </div>
                    </div>
                </div>
            
            </div>
            
            
           
          
        </div>
    </div>
</div>


@endsection
