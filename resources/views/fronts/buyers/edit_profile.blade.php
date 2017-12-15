@extends('layouts.buyer')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold"><span class="text-primary">Profile</span></div>
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
                <form name="frm" action="{{url('/buyer/update')}}" method="post" class="from-horizontal" onsubmit="return confirm('You want to save changes?')">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$buyer->id}}">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">First Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="first_name" value="{{$buyer->first_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Last Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" name="last_name" required value="{{$buyer->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="username" value="{{$buyer->username}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" name="phone" required value="{{$buyer->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control border-radius-none" required name="email" value="{{$buyer->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary border-radius-none">Save Changes</button>
                                <a href="{{url('/buyer/profile')}}" class="btn btn-danger border-radius-none">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection