@extends('layouts.shop_owner')
@section('content')
    <style>
        .panel-pricing:hover {
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
        .panel-pricing .list-group-item {
        color: #777777;
        border-bottom: 1px solid rgba(250, 250, 250, 0.5);
        }
        .panel-pricing .list-group-item:last-child {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        }
        .panel-pricing .list-group-item:first-child {
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        }
        .panel-pricing .panel-body {
        background-color: #f2f2f2;
        font-size: 15px;
        color: #00E676;
        margin: 0;
        }
        .pd-none {
            padding: 4px;
        }
        .fa-check {
            color: #00E676;
        }
    </style>
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Subscription
        </div>
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
            @if($counter<=0)
                <div class="row">
                    <div class="col-sm-12">
                        <strong class="text-danger">
                        @if(session('lang')=='en')
                            You don't have a subscription yet. Please do subscribe one of the following packages to be able post jobs.
                        @else
                            លោកអ្នកមិនទាន់បានទិញគម្រោងណាមួយនៅឡើយទេ។ សូមទិញគម្រោងណាមួយនៅខាងក្រោមនេះ។                            
                        @endif
                        </strong>
                        <p></p>
                    </div>
                </div>
            @else
                <div class="row px">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Package Name : <strong>{{$subscription->name}}</strong></p>
                                <p>Price : <strong>$ {{$subscription->price}}</strong></p>
                                <p>Plan Type: <strong>{{$subscription->type}}</strong></p>
                                <p>Total Product: <strong>{{$subscription->product_number}}</strong></p>
                               
                            </div>
                            <div class="col-sm-6">
                                <p>Duration: <strong>{{$subscription->day_number}} days</strong></p>
                                <p>Expire Date: <strong>{{$subscription->expired_date}}</strong></p>
                                <p>Product Remaining: <strong>{{$subscription->product_number - $product_count}}</strong></p>
                                <p>Status: <strong><label class="label label-warning">{{$subscription->status==0?'Pending':'Approved'}}</label></strong></p>
                                <form action="{{url('/shop-owner/unsubscribe')}}" onsubmit="return confirm('You want to unsubscribe?')" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="id" value="{{$subscription->id}}">
                                    <input type="submit" value="Unsubscription" class="btn btn-danger btn-sm">
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endif
            <div class="card-block">
            @foreach($packages as $package)
                <div class="col-md-3 text-center pd-none">
                    <div class="panel panel-success panel-pricing">
                        <div class="panel-body text-center">
                            <strong>$ {{$package->price}} / {{$package->name}}</strong>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Product Number : {{$package->product_number}}</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Number of Day: {{$package->day_number}}</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Type: {{$package->type}}</li>
                        </ul>
                        
                        <div class="panel-footer">
                            @if($subscription)
                                <form action="{{url('/shop-owner/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                    {{csrf_field()}}
                                    <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                    <input type="submit" class="btn btn-sm btn-primary btn-block" value="Subscribe" {{$package->id==$subscription->package_id?'disabled':''}}>
                                </form>
                            @else
                                <form action="{{url('/shop-owner/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                    {{csrf_field()}}
                                    <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                    <input type="submit" class="btn btn-sm btn-primary btn-block" value="Subscribe">
                                </form>

                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection