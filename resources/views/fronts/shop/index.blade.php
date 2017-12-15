@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Shop</div>
        <div class="panel-body">
            @if($shop==NULL)
                <div class="row">
                    <div class="col-sm-12">
                        <p class="text-center text-success"><strong>You don't have a shop yet. Please create one!</strong></p>
                        <p class="text-center">
                            <a href="{{url('/shop-owner/shop/create')}}" class="btn btn-primary border-radius-none">Create New Shop</a>
                        </p>
                    </div>
                </div>
            @else
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
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <img src="{{asset('upload/company/'.$shop->logo)}}" width="100">
                    </div>
                </div><hr>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Name</label>
                        <div class="col-sm-7">
                            <p>{{$shop->name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Contact Person</label>
                        <div class="col-sm-7">
                            <p>{{$shop->contact_person}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Addresss</label>
                        <div class="col-sm-7">
                            <p>{{$shop->address}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Description</label>
                        <div class="col-sm-7">
                            <p>{{$shop->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Phone</label>
                        <div class="col-sm-7">
                            <p>{{$shop->phone}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5">Email</label>
                        <div class="col-sm-7">
                            <p>{{$shop->email}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Payment</label>
                        <div class="col-sm-7">
                            <p>{{$shop->payment}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">&nbsp;</label>
                        <div class="col-sm-7">
                            <a href="{{url('/shop-owner/shop/edit')}}" class="btn btn-primary border-radius-none">Edit Shop</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection