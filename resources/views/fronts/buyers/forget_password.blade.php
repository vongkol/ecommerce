@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/css/login.css')}}">
    <form action="{{url('/buyer/forgot/recovery')}}" accept-charset="UTF-8" method="post">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="lock">
                <img src="{{asset('front/img/forgotpassword.png')}}" alt="forgot passoword">
            </div>
                <center>
                    <div class="login col-md-3 col-sm-3" align="left">
                        <div align="right" class="login-logo"><img src="{{asset('front/img/logo.png')}}"></div>
                        @if(Session::has('sms1'))
                            <div class="text-danger login-error">
                                {{session('sms1')}}
                            </div>
                        @endif
                        <h5 class="text-center">Account help</h5>	
                        Enter an your E-mail using with this Phsa42 Account <br><br>
                        <input type="email" id="email" name="email" placeholder="E-mail" required autofocus value="{{old("email")}}"><br><br>
                        <input type="submit" name="Submit" value="Submit">
                    </div>
                </center>
            </div>
        </div>
    </form>
    <hr>
    <p class="text-center small">Copyright Notice © <img src="{{asset('front/img/logo.png')}}" width="40"> Cambodia Limited and licensees. All rights reserved.</p>
@endsection