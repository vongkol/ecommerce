@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
    <form action="{{url('/shop-owner/forgot/recovery')}}" accept-charset="UTF-8" method="post">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="lock">
                <img src="{{asset('front/img/forgotpassword.png')}}" alt="forgot passoword">
            </div>
                <center>
                    <div class="login col-md-4 col-sm-4" align="left">
                        <div align="right" class="login-logo"><img src="{{asset('front/img/shop.png')}}"></div>
                        @if(Session::has('sms'))
                            <div class="text-success register-success">
                                {{session('sms')}}
                            </div>
                        @endif
                        @if(Session::has('sms1'))
                            <div class="login-error text-danger">
                                {{session('sms1')}}
                            </div>
                        @endif
                        <h5 class="text-center">Shop Owner Account help</h5>	
                        Enter an your E-mail using with this Phsa42 Account <br><br>
                        <input type="email" id="email" name="email" placeholder="E-mail" class="w-100" required autofocus value="{{old("email")}}"><br><br>
                        <input type="submit" name="Submit" class="w-100" value="Submit">
                        <a href="{{url('shop-owner/login')}}"><p align="right">Login</p></a>
                    </div>
                </center>
            </div>
        </div>
    </form>
@endsection