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
                    <div class="col-md-8 "   style="border: 1px solid #cacaca;margin-left: 0px;"   >
                        <div class="row ">
                            <div class="col-md-12">
                                <h2 class="l6"><i class="fa fa-briefcase"> Danh Sách Khảo sát</i></h2>
                            </div>
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                           <a class="nav-link active" id="tab-javascript" data-toggle="tab"
                                              href="#content-javascript"
                                              role="tab" >
                                            Khảo Sát Học Phần
                                           </a>
                                        </li>
                                        <li class="nav-item">
                                           <a class="nav-link" id="tab-css" data-toggle="tab"
                                              href="#content-css"
                                              role="tab" >
                                            Khảo Sát khác
                                           </a>
                                        </li> 
                                </ul>              
                                <div class="tab-content" id="myTabContent" style="background: white;padding-left: 10px;">
                                    <div class="tab-pane fade show active" id="content-javascript"
                                        role="tabpanel " >
                                        @foreach($kshp as $kst)
                                        <div class=" col-md-10 offset-md-1 ">
                                            <div class="t3">
                                                <div class="row ">
                                                    <div class="col-md-2 offset-md-1 t1">
                                                       <img class="l5" src="isset/fronted/image/tb.png" alt=""> 
                                                    </div>                                          
                                                    <div class="col-md-8 t2 ">    
                                                        <b>{{$kst->NameTheme}}</b><br>
                                                    <a class="n4" href="/prodview4/{{$kst->id}}">Thông báo về khảo sát {{$kst->NameSurvey}}</a>                               
                                                    </div>
                                                    <div style="margin-top:-15px">
                                                        <img style="margin-left: 455px" src="isset/fronted/image/user.png" alt="">
                                                        <b style="margin-left: 3px;">{{$kst->type}} </b>    
                                                    </div>                                     
                                                </div>
                                                
                                            </div>  
                                        </div>
                                        @endforeach  
                                        
                                            {{-- {{!! $kshp->render() !!}} --}}
                                    </div> 
                                    <div class="tab-pane fade" id="content-css"
                                        role="tabpanel" >
                                       
                                        <div class=" col-md-10 offset-md-1 ">
                                            @foreach($ksall as $ks)
                                            <div class="t3">
                                                <div class="row ">
                                                    <div class="col-md-2 offset-md-1 t1">
                                                       <img class="l5" src="isset/fronted/image/tb.png" alt=""> 
                                                    </div>                                          
                                                    <div class="col-md-8 t2 ">
                                                        @if ($ks->type=='Sinh Viên') 
                                                        
                                                            <b>{{$ks->NameTheme}}</b><br>
                                                            <a class="n4" href="/prodview2/{{$ks->id}}"></i>Thông báo về khảo sát {{$ks->NameSurvey}}</a>  
                                                          
                                                        @elseif( $ks->type == 'Giảng Viên')
                                                        
                                                            <b>{{$ks->NameTheme}}</b><br>
                                                            <a class="n4" href="/prodview3/{{$ks->id}}"></i>Thông báo về khảo sát {{$ks->NameSurvey}}</a> 
                                                        
                                                        @elseif( $ks->type == 'Cựu sinh Viên')
                                                        
                                                            <b>{{$ks->NameTheme}}</b><br>
                                                            <a class="n4" href="/prodview/{{$kss->id}}"></i>Thông báo về khảo sát {{$ks->NameSurvey}}</a> 
                                                        
                                                        @else
                                                        
                                                            <b>{{$ks->NameTheme}}</b><br>
                                                            <a class="n4" href="/prodview5/{{$ks->id}}"></i>Thông báo về khảo sát {{$ks->NameSurvey}}</a> 
                                                         
                                                        @endif
                                                    </div>
                                                    <div style="margin-top:-15px">
                                                        <img style="margin-left: 420px;" src="isset/fronted/image/user.png" alt="">
                                                        <b style="margin-left: 3px;">{{$ks->type}} </b>     
                                                    </div>                                      
                                                </div>
                                            </div> 
                                            @endforeach 
                                            <div class="row pagination pagination-sm paginatiton-centered">
                                                {{$ksall->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="col-md-4"style="margin-left: -7px;" >
                        <div class="p4">
                            <div class="col-md-12">
                                <h2 class="l6"><i class="fa fa-address-book" aria-hidden="true"></i> Tin Tức</i></h2>
                            </div>
                            @foreach($new as $n)
                            <div class=" col-md-10 offset-md-1 ">
                                <div class="ks1">
                                    <div class="row ">
                                        <p class="ks2"><i class="fa fa-arrow-right" aria-hidden="true"></i> <a class="n4" href="/new/{{$n->id}}">{{$n->title}}</a></p>                                     
                                    </div>
                                </div>  
                            </div>
                            @endforeach    
                        </div>
                        <div class="l9">
                            <div class="alert alert-info" style="background-color: #007bff;" role="alert">
                                <h4 class="m1">Hỗ Trợ Kĩ Thuật</h4>
                                
                            </div>
                            <div class="ks1" style="padding-top: 20px">
                                <p class="ap">Nhân Viên Kỹ Thuật: Trần Văn Minh </p> 
                                <p class="ap">Email: Minhcntt29091997@gmail.com </p> 
                                <p class="ap">skype:minha2@outlook.com</p>
                                <p class="ap">Số điện thoại:0348439495</p>
                            </div> 
                        </div>
                    
                    </div>
                </div>
            
            </div>
            
            
           
          
        </div>
    </div>
</div>
@endsection