@extends('frontend.master')
@section('content')
<div class="ch">
    
    <div class="than3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 than33">
                    <div class="alert alert-secondary" role="alert" style="background-color: #007bff;">
                        <h3 class="m1" >Khảo Sát Cựu Sinh Viên</h3>     
                    </div>
                    
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger" style="margin-left: 445px;
                    width: 300px;">
                        @foreach($errors->all() as $err)
                        <p style="text-align:center">{{$err}} <br></p>
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12 a" style="margin-top: 30px;">
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-1 ">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <label class="hk" for="inputState">Đợt thi</label>
                                </div>
                                <div class="col-md-8  ">
                                    <select name="survey" id="survey" >
                                        @foreach($dotthi as $v)
                                            @if($v->id == $id_survey)
                                            <option value="{{$v->id}}" selected>{{$v->NameSurvey}}</option>
                                            @else
                                            <option value="{{$v->id}}">{{$v->NameSurvey}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>                                      
                            </div>                                    
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label class="kl" for="inputState"> Cựu Sinh Viên Khảo sát</label>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="kk1" for="inputState">{{$name}}</label>
                                </div>                                      
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bch">
            <div class="container">
                <div class="bch1">
                    <form action="/postQuestionAlummi/{{$idUser}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" /> 
                        <input type="hidden" name="id_survey" value="{{$id_survey}}">
                            <div class="row">
                                <div class="col-md-12 ch3" style="margin-top:20px" >
                                    <?php $i = 1; ?>
                                    @foreach ($survey as $item)
                                    <div class="col-md-12">
                                        <b>Câu {{$loop->index+1}}: {{$item->NameQuestion}}:</b>
                                        <input
                                        type="hidden"
                                        name="questions[{{ $i }}]"
                                        value="{{ $item->id }}">
                                        <div class="col-md-12 ch2" style="margin-top: 15px;"  >
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col-md-4 offset-md-1 ">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="onechange[{{$item->id}}]" id="" value="{{$item->PAA}}" >
                                                        {{$item->PAA}}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-5 offset-md-2 ">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="onechange[{{$item->id}}]" id="" value="{{$item->PAB}}" >
                                                        {{$item->PAB}}
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12 ch2" style="margin-top: 15px;"  >
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col-md-4 offset-md-1 ">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="onechange[{{$item->id}}]" id="" value="{{$item->PAC}}" >
                                                        {{$item->PAC}}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-5 offset-md-2 ">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="onechange[{{$item->id}}]" id="" value="{{$item->PAD}}" >
                                                        {{$item->PAD}}
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>        
                                    </div>
                                    <?php $i++; ?>
                                    @endforeach
                                    <div class="col-md-12 " >
                                        <div class="row">
                                            <div class="col-md-6 offset-md-6">
                                                <div class="row">
                                                    <div class="btn-group a" style="width:600px" role="group" aria-label="">
                                                        <div class="col-md-3">
                                                            <button type="submit" class="btn btn-primary" onclick="myFunction()">Gửi kết quả</button>
                                                        </div>
                                                        <div class="col-md-3" style="margin-left: 30px">
                                                            <button type="button" class="btn btn-primary" ><a style="color: white;" href="/trang-chu">Thoát </a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    </div>
                                </div>                                 
                            </div>
                    </form>       
                </div>               
            </div>
        </div>      
    </div>
</div>
@endsection