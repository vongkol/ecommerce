@extends('layouts.front')
@section('content')
<div class="header-margin-top"></div>
<div class="container">
    <div class="col-md-4 col-sm-4 col-md-offset-2">
        <div class="panel border-radius-none panel-default">
            <div class="panel-body">
            <div class="bold">Create a New Account</div><hr>
                <form action="">
                    <label>Username:</label>
                    <input 
                        type="text" 
                        class="form-control border-radius-none" 
                        placeholder="Username" 
                    ><br>
                    <label>Email address:</label>
                    <input 
                        type="text" 
                        class="form-control border-radius-none" 
                        placeholder="example@gmail.com" 
                    ><br>
                    <label>Create password:</label>
                    <input 
                        type="password" 
                        class="form-control border-radius-none" 
                        placeholder="Password" 
                    ><br>
                    <label>Confirm your password:</label>
                    <input 
                        type="password" 
                        class="form-control border-radius-none" 
                        placeholder="Enter password again" 
                    ><br>
                    <input 
                        type="submit" 
                        class="btn btn-default text-center form-control border-radius-none" 
                        value="Create Your Account"
                    >
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <img src="{{asset('img/online-shop.png')}}" width="100%">
    </div>
</div>
@endsection