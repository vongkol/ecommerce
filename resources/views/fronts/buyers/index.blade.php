@extends('layouts.buyer')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold"><span class="text-primary">My Profile</span></div>
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
                    <label class="col-sm-5">First Name</label>
                    <div class="col-sm-7">
                        <p>{{session('customer')->first_name}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Last Name</label>
                    <div class="col-sm-7">
                        <p>{{session('customer')->last_name}}</p>
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-sm-5">Username</label>
                    <div class="col-sm-7">
                        <p>{{session('customer')->username}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-5">Phone</label>
                    <div class="col-sm-7">
                        <p>{{session('customer')->phone}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Email</label>
                    <div class="col-sm-7">
                        <p>{{session('customer')->email}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">&nbsp;</label>
                    <div class="col-sm-7">
                        <a href="{{url('/buyer/profile/edit')}}" class="btn btn-primary border-radius-none">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection