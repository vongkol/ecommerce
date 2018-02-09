@extends('layouts.shop_owner')
@section('content')
    <span class="text-primary"><img src="{{asset('front/img/login.png')}}"> <b>Edit Profile</b></span>
    <hr>
    @if(Session::has('sms'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success" role="alert">
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
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{session('sms1')}}
                </div>
            </div>
        </div>
    @endif
    <form name="frm" action="{{url('/shop-owner/profile/update')}}" method="post" class="from-horizontal" onsubmit="return confirm('You want to save changes?')">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$shop_owner->id}}">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-4">First Name <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="w-100" required name="first_name" value="{{$shop_owner->first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Last Name <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="w-100" name="last_name" required value="{{$shop_owner->last_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-4">Email Address<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="email" class="w-100" required name="email" value="{{$shop_owner->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Phone Number<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="w-100" required name="phone" value="{{$shop_owner->phone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-sm">Save Changes</button>
                        <a href="{{url('/shop-owner/profile')}}" class="btn btn-danger btn-sm">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection