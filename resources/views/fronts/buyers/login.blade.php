@extends('layouts.secure')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('front/css/login.css')}}">
    <form action="{{url('/buyer/is-login')}}" accept-charset="UTF-8" method="post">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="lock">
                <img src="{{asset('front/img/buyer_login.jpg')}}" alt="secure image">
            </div>
                <center>
                    <div class="login col-md-4 col-sm-4" align="left">
                        <div align="right"><img src="{{asset('front/img/login.png')}}"></div>
                        @if(Session::has('sms1'))
                            <div class="text-danger login-error">
                                {{session('sms1')}}
                            </div>
                        @endif
                        <b>Account:</b> <br>
                        <input type="email" name="email" placeholder="E-mail address"​ class="w-100" required><br><br>
                        <b>Password:</b><br>
                        <input type="password" name="pass" placeholder="Password" class="w-100" required><br><br>
                        <input type="submit" name="login" class="w-100" value="Login">
                        <a href="{{url('/buyer/forget-password')}}">Forget password</a>
                        <a href="{{url('buyer/register')}}"><p align="right">Register</p></a>
                    </div>
                </center>
            </div>
        </div>
    </form>
@endsection