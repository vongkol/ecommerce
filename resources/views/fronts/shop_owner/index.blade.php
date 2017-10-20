@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading">My Profile</div>
        <div class="panel-body">
            @if(Session::has('sms'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success border-radius-none" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
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
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label for="first_name" class="control-label col-sm-5">First Name</label>
                    <div class="col-sm-7">
                        <p id="first_name">{{session('shop_owner')->first_name}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="control-label col-sm-5">Last Name</label>
                    <div class="col-sm-7">
                        <p id="last_name">{{session('shop_owner')->last_name}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="control-label col-sm-5">Gender</label>
                    <div class="col-sm-7">
                        <p id="gender">{{session('shop_owner')->gender}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dob" class="control-label col-sm-5">Date of Birth</label>
                    <div class="col-sm-7">
                        <p id="dob">{{session('shop_owner')->dob}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label for="phone" class="control-label col-sm-5">Phone</label>
                    <div class="col-sm-7">
                        <p id="phone">{{session('shop_owner')->phone}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="control-label col-sm-5">Email</label>
                    <div class="col-sm-7">
                        <p id="email">{{session('shop_owner')->email}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="control-label col-sm-5">Username</label>
                    <div class="col-sm-7">
                        <p id="username">{{session('shop_owner')->username}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-5">&nbsp;</label>
                    <div class="col-sm-7">
                        <a href="{{url('/shop-owner/profile/edit')}}" class="btn btn-primary border-radius-none">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection