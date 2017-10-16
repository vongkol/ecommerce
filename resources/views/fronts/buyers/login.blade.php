@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<div class="header-margin-top"></div>
<div class="container">
    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Mastermalls</h2>	
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required="required">
                <input type="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Login</button>
            </div>
            <p class="text-center"><a href="#">Forgot Password?</a></p>     
        </form>
        <p class="text-center small">Not Registered? <a href="#">Create an Account</a></p>
    </div>
</div>
@endsection