@extends('layouts.front')
@section('content')
<div class="header-margin"></div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-md-offset-2">
        <div class="panel border-radius-none panel-default">
            <div class="panel-body">
            <div class="bold">Please login</div><hr>
                <form action="{{url('/buyer/buyer')}}">
                    <label>Account:</label>
                    <input 
                        type="text" 
                        class="form-control border-radius-none" 
                        placeholder="Username" 
                        required
                    ><br>
                    <label>Password:</label> <a href="#" class="pull-right"> Forget password?</a>
                    <input 
                        type="password" 
                        class="form-control border-radius-none" 
                        placeholder="Password"
                        required
                    ><br>
                    <input 
                        type="submit" 
                        class="btn border-radius-none btn-default text-center form-control" 
                        value="Sing in"
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