@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
<br><br><br>
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
        <form action="{{url('/shop-owner/save-password')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
            {{csrf_field()}}
            <h4 class="text-center"><img src="{{asset('front/img/shop.png')}}"> Shop Owner Reset Your Password</h4>	
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="New Password" class="form-control" required autofocus>
                <input type="hidden" id="id" name="id" value="{{$id}}"><br>
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block">Reset</button>
            </div> 
        </form>
    </div>
</div>
<script charset="utf-8" type="text/javascript">
    function check(event)
    {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("cpassword").value;

        if( password != confirm_password) {
            document.getElementById("cpassword").style.border="1px solid red";
            event.preventDefault();
        } 

        if( password === confirm_password){
            document.getElementById("form_employee").submit();
        }
    }
</script>
@endsection