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
            <div class="card-block">
            @foreach($packages as $package)
                <div class="col-md-3 text-center pd-none">
                    <div class="panel panel-success panel-pricing">
                        <div class="panel-body text-center">
                            <p><strong>$ {{$package->price}} / {{$package->name}}</strong></p>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Product Number : {{$package->product_number}}</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Number of Day: {{$package->day_number}}</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Type: {{$package->type}}</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-sm btn-block btn-primary border-radius-none" href="#">BUY NOW!</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection