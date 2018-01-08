@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Reset Password</div>
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
                <form name="frm" action="{{url('/shop-owner/resetpwd/update')}}" method="post" class="from-horizontal" onsubmit="return confirm('You want to save changes?')">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$owner_id->id}}">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <!-- <div class="form-group row">
                            <label class="control-label col-sm-4">Old Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control border-radius-none" required name="old_password" id="old_password" value="">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-4">New Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control border-radius-none" id="new_password" name="new_password" required value="" placeholder="Please enter new password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-4">Re-Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control border-radius-none" id="re_password" name="re_password" required value="" placeholder="Please Re-enter password">
                            </div>
                        </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary border-radius-none">Save Change</button>

                                <button type="reset" class="btn btn-danger border-radius-none">Clear</button>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection