@extends('layouts.secure')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('front/css/login.css')}}">
    <form action="{{url('/buyer/is-login')}}" accept-charset="UTF-8" method="post">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="lock">
                <img src="{{asset('front/img/lock.png')}}" alt="secure image">
            </div>
                <center>
                    <div class="login col-md-3 col-sm-3" align="left">
                        <div align="right" class="login-logo"><img src="{{asset('front/img/logo.png')}}"></div>
                        @if(Session::has('sms1'))
                            <div class="text-danger login-error">
                                {{session('sms1')}}
                            </div>
                        @endif
                        <b>Account:</b> <br>
                        <input type="email" name="email" placeholder="E-mail address"><br><br>
                        <b>Password:</b><br>
                        <input type="password" name="pass" placeholder="Password"><br><br>
                        <input type="submit" name="login" value="Login">
                        <a href="{{url('/buyer/forget-password')}}">Forget password</a>
                        <a href="{{url('buyer/register')}}"><p align="right">Register</p></a>
                    </div>
                </center>
            </div>
        </div>
    </form>
    <hr>
    <p class="text-center small">Copyright Notice © <img src="{{asset('front/img/logo.png')}}" width="40"> Cambodia Limited and licensees. All rights reserved.</p>
@endsection