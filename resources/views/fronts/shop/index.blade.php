@extends('layouts.shop_owner')
@section('content')
<div class="tab-pane" id="shop" role="tabpanel">
        <div class="group-buy">
            @if($shop==NULL)
                <div class="col-sm-12">
                    <p align="center">
                        <img src="{{asset('front/img/shop_now.png')}}" alt="Don't have shop icon" width="50">
                    </p>
                    <p align="center"><b>You don't have a shop yet. Please create one!</b></p>
                    <p class="text-center">
                        <a href="{{url('/shop-owner/shop/create')}}" class="btn btn-info btn-lg">Create a New Shop</a>
                    </p>
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
                <div class="col-sm-12" align="center">
                    <img src="{{asset('upload/company/'.$shop->logo)}}" width="100">
                </div>
                <p>
                    <a href="{{url('shop-owner/shop/edit/'.$shop->id)}}"><button class="btn btn-sm">Edit Shop</button></a>
                </p>
               
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Payment</th>
                        <th>Addresss</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->contact_person}}</td>
                        <td>{{$shop->phone}}</td>
                        <td>{{$shop->email}}</td>
                        <td>{{$shop->payment}}</td>
                        <td>{{$shop->address}}</td>
                        <td>{{$shop->description}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection