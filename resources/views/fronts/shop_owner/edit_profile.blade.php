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
        <div class="col-md-12 col-sm-12">
                <form name="frm" action="{{url('/shop-owner/update')}}" method="post" class="from-horizontal" onsubmit="return confirm('You want to save changes?')">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$shop_owner->id}}">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="first_name" class="control-label col-sm-4">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="first_name" id="first_name" value="{{$shop_owner->first_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="control-label col-sm-4">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="last_name" name="last_name" required value="{{$shop_owner->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="control-label col-sm-4">Gender</label>
                            <div class="col-sm-8">
                                <select name="gender" id="gender" class="form-control border-radius-none">
                                    <option value="Male" {{$shop_owner->gender=='Male'?'selected':''}}>Male</option>
                                    <option value="Female"  {{$shop_owner->gender=='Female'?'selected':''}}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="control-label col-sm-4">Date of Birth</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="dob" name="dob" 
                                value="{{$shop_owner->dob}}" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="phone" class="control-label col-sm-4">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="phone" name="phone" value="{{$shop_owner->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label col-sm-4">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="email" required name="email" value="{{$shop_owner->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="control-label col-sm-4">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="username" required name="username" value="{{$shop_owner->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary border-radius-none">Save Changes</button>
                                <a href="{{url('/shop-owner/profile')}}" class="btn btn-danger border-radius-none">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection