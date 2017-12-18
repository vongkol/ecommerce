@extends('layouts.front')
@section('content')   
<br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="panel panel-info border-radius-none">
            <div class="panel-heading border-radius-none"><b>{{$about->title}}</b></div>
            <div class="panel-body">{!!$about->description!!}</div>
        </div>
    </div>
@endsection