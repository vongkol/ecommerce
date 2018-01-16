@extends('layouts.front')
@section('content')
<div class="group-buyer">
    <span class="text-primary"><img src="{{asset('front/img/shop.png')}}"> <b>Create a New Shop</b></span>
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
        <form enctype="multipart/form-data"  action="{{url('/shop-owner/shop/save')}}" method="post" class="from-horizontal">
        {{csrf_field()}}
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" required name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Contact Person <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" required name="contact_person">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" name="address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">
                            Description
                        </label>
                        <div class="col-sm-8">
                            <textarea name="description" class="w-100" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Phone <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" id="" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="w-100" id="email" required name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Payment</label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" name="payment">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Logo</label>
                        <div class="col-sm-8">
                            <input type="file" name="logo" id="logo" class="w-100" onchange="loadFile(event)">
                            <br>
                            <img src="{{asset('upload/company/default-logo.png')}}" alt="logo" width="100" id="img">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-sm">Save</button>
                            <a href="{{url('/shop-owner/shop')}}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div>
                </div>
        </form>
</div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection