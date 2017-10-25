@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/register.css')}}">
<style>
    .signup-form form {
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form h2, .ps {
        color: #888;
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
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>
                {{session('sms1')}}
            </div>
        </div>
    @endif
    <div class="signup-form">
        <form action="{{url('/shop-owner/account/save')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
            {{csrf_field()}}
            <h2>Register</h2>
            <p class="hint-text"><sapn class="ps">Create a New Account. It's free and only takes a minute.</sapn></p>
            <div class="form-group has-error has-feedback">
                <input type="text"value="{{old('first_name')}}" class="form-control" name="first_name" placeholder="First Name" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <input type="text"value="{{old('last_name')}}" class="form-control" name="last_name" placeholder="First Name" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <input type="text"  value="{{old('phone')}}"  class="form-control" name="phone" placeholder="Phone Number" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group">
                <select class="form-control" name="gender" id="gender"  id="exampleSelect1">
                    <option value="Male">Male</option> 
                    <option value="Female">Female</option>                
                </select>
            </div>
            <div class="form-group">
                    <input 
                        type="text" 
                        name="dob" 
                        id="dob"
                        placeholder="Date-of-Birth"
                        class="form-control"
                        value="{{ old('dob') }}"
                    >
            </div>
            <div class="form-group has-error has-feedback">
                <input type="text"  value="{{old('username')}}"  class="form-control" name="username" placeholder="Username" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>        
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-lg btn-block">Register Now</button>
            </div>
        </form>
        
    </div>
</div>
<script charset="utf-8" type="text/javascript">
    function check(event)
    {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if( password != confirm_password) {
            document.getElementById("confirm_password").style.border="1px solid red";
            event.preventDefault();
        } 

        if( password === confirm_password){
            document.getElementById("form_employee").submit();
        }
    }
</script>
@endsection