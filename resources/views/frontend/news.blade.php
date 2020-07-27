@extends('frontend.master')
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-12">
                        <div class="new" style="background: white;margin-top:-35px">
                                <div class="col-md-9 offset-md-2"     >
                                        <h3 class="new">{{$baoaa->title}}</h3>
                                        <p class="new">{!!   $baoaa->content  !!}</p>
                                </div>
                        </div>
                </div>
                
        </div>
</div>
        
@endsection