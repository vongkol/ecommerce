@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<style>
    .login-form form {
        color: #405e9e;
        background: #fff;
    }
    .ps {
        color: #405e9e;
    }
</style>
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
        <form action="{{url('/shop-owner/is-login')}}" accept-charset="UTF-8" method="post">
            {{csrf_field()}}
            <h2 class="text-center">Mastermalls</h2>	
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Login</button>
            </div>
            <p class="text-center"><a href="{{url('shop-owner/forget-password')}}"><span class="ps">Forgot Password?</span></a></p>     
        </form>
        <p class="text-center small">Not Registered? <a href="{{url('shop-owner/account/register')}}">Create an Account</a></p>
    </div>
</div>
@endsection