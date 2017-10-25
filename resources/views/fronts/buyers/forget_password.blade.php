@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<div class="pd-top"></div>
<div class="container">
    @if(Session::has('sms'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>
                {{session('sms')}}
            </div>
        </div>
    @endif
    @if(Session::has('sms1'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger border-radius-none" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{session('sms1')}}
                </div>
            </div>
        </div>
    @endif
    <div class="login-form">
        <form action="{{url('/buyer/forgot/recovery')}}" accept-charset="UTF-8" method="post">
            {{csrf_field()}}
            <h2 class="text-center">Account help</h2>	
            Enter an your E-mail using with this Mastermalls Account <br><br>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="E-mail" class="form-control" required autofocus value="{{old("email")}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Submit</button>
            </div>  
        </form
    </div>
</div>
@endsection