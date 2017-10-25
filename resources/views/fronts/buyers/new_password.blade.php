@extends('layouts.secure')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/login.css')}}">
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
        <form action="{{url('/buyer/service/update')}}" accept-charset="UTF-8" method="post">
            {{csrf_field()}}
            <h2 class="text-center">Reset Your Password</h2>	
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="New Password" class="form-control" required autofocus>
                <input type="hidden" id="id" name="id" value="{{$id}}">
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Reset</button>
            </div> 
        </form>
    </div>
</div>
@endsection