@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<form action="{{url('/shop-owner/account/save')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
{{csrf_field()}}   
    <div class="lock">
        <img src="{{asset('front/img/shop_owner_register.jpg')}}">
    </div>
    <center>
        <div class="login col-md-4 col-sm-4" align="left">
            <div align="right"><img src="{{asset('front/img/shop.png')}}"></div>
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
            <b>Your name:</b>
            <div>
                <input type="text" class="input-fn" name="first_name" placeholder="First name" required> 
                <input type="text" class="input-ln" name="last_name" placeholder="Last name" required><br><br>
            </div>
            <b>Email address:</b> <br>
            <input type="email" name="email" placeholder="E-mail address" class="w-100" required><br><br>
            <b>Phone Number:</b> <br>
            <input type="text" name="phone" placeholder="Phone Number" class="w-100" required><br><br>
            <b>Create a password:</b><br>
            <input type="password" name="password" id="pass" placeholder="Password" class="w-100" required><br><br>
            <b>Confirm your password::</b><br>
            <input type="password" name="comfirm_password" id="re_pass" placeholder="Confirm password" class="w-100" required><br><br>
            <input type="submit" name="register" class="w-100" value="Register">
            <a href="{{url('shop-owner/login')}}"><p align="right">Login</p></a>
        </div>
    </center>
</from>
<script charset="utf-8" type="text/javascript">
    function check(event)
    {
        var password = document.getElementById("pass").value;
        var confirm_password = document.getElementById("re_pass").value;

        if( password != confirm_password) {
            document.getElementById("re_pass").style.border="1px solid red";
            event.preventDefault();
        } 

        if( password === confirm_password){
            document.getElementById("form_employee").submit();
        }
    }
</script>
@endsection