@extends('layouts.front')
@section('content')
<div class="group-buyer">
    <span class="text-primary"><img src="{{asset('front/img/shop.png')}}"> <b>Edit Shop</b></span>
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
        <form enctype="multipart/form-data"  action="{{url('/shop-owner/shop/update')}}" method="post" class="from-horizontal">
        {{csrf_field()}}
        <input type="hidden" id="id" value="{{$shop->id}}" name="id">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" required name="name" value="{{$shop->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Contact Person <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" required name="contact_person" value="{{$shop->contact_person}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" name="address" value="{{$shop->address}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">
                            Description
                        </label>
                        <div class="col-sm-8">
                            <textarea name="description" class="w-100" rows="3">{{$shop->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Phone <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" id="" name="phone" value="{{$shop->phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="w-100" id="email" required name="email" value="{{$shop->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Payment</label>
                        <div class="col-sm-8">
                            <input type="text" class="w-100" name="payment" value="{{$shop->payment}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Logo</label>
                        <div class="col-sm-8">
                            <input type="file" name="logo" id="logo" class="w-100" onchange="loadFile(event)">
                            <br>
                            @if($shop->logo != null)
                                <img src="{{asset('upload/company/'.$shop->logo)}}" alt="logo" width="100" id="img">
                            @else
                                <img src="{{asset('upload/company/default-logo.png')}}" alt="logo" width="100" id="img">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-sm">Save Change</button>
                            <a href="{{url('/shop-owner/profile')}}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div>
                </div>
        </form>
</div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 100;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection