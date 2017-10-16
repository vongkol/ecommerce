@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/register.css')}}">
<div class="header-margin-top"></div>
<div class="container">
    <div class="signup-form">
        <form action="" method="post">
            <h2>Register</h2>
            <p class="hint-text">Create a New Account. It's free and only takes a minute.</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>        	
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>        
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-lg btn-block">Register Now</button>
            </div>
        </form>
    </div>
</div>
@endsection