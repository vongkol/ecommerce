@extends('layouts.front')
@section('content')
<div class="group-buyer">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><img src="{{asset('front/img/login.png')}}" width="15"> Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#shop" role="tab"><img src="{{asset('front/img/shop.png')}}" width="15"> Shop</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#subscription" role="tab"><img src="{{asset('front/img/subscription.png')}}" width="18"> Subscription</a>
        </li>
    </ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="row">
            <div class="col-md-8">
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
                <table class="table w-100">
                    <thead>
                        <tr class="table-default">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{session('shop_owner')->first_name}}</td>
                            <td>{{session('shop_owner')->last_name}}</td>
                            <td>{{session('shop_owner')->phone}}</td>
                            <td>{{session('shop_owner')->email}}</td>
                            <td>
                                <a href="{{url('/shop-owner/profile/edit')}}"><button class="btn btn-sm">Edit Profile</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="reset-pass">
                    <form action="{{url('/shop-owner/service/update')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
                    {{csrf_field()}}    
                        <div class="form-group">
                            <input type="password" class="w-100" placeholder="New Password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="w-100" placeholder="Confirm Password" name="cpassword" id="cpassword" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm">Reset</button>
                    </form>
                </div>
            </div>
            <script charset="utf-8" type="text/javascript">
                function check(event)
                {
                    var password = document.getElementById("password").value;
                    var confirm_password = document.getElementById("cpassword").value;

                    if( password != confirm_password) {
                        document.getElementById("cpassword").style.border="1px solid red";
                        event.preventDefault();
                    } 

                    if( password === confirm_password){
                        document.getElementById("form_employee").submit();
                    }
                }
            </script>
        </div><br>
    </div>
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
    <div class="tab-pane" id="subscription" role="tabpanel">
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
        <form action="{{url('/shop-owner/unsubscribe')}}" onsubmit="return confirm('You want to unsubscribe?')" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id" value="{{$subscription->id}}">
            <input type="submit" value="Unsubscript" class="btn btn-danger">
        </form><br>
        <table class="table w-100">
            <thead>
            <tr>
                <th>Package Name</th>
                <th>Price</th>
                <th>Plan Type</th>
                <th>Expired Date</th>
                <th>Duration</th>
                <th>Total Product</th>
                <th>Product Remaining</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><span class="badge badge-secondary">{{$subscription->name}}</span></td>
                <td class="text-info">$ {{$subscription->price}}</td>
                <td>{{$subscription->type}}</td>
                <td class="text-danger">{{$subscription->expired_date}}</td>
                <td>{{$subscription->day_number}} days</td>
                <td>{{$subscription->product_number}}</td>
                <td>{{$subscription->product_number - $product_count}}</td>
                <td>{{$subscription->status==0?'Pending':'Approved'}}</td>
            </tr>
            </tbody>
        </table>
        @endif
        <hr>
        <div class="col-md-12">
            <div class="row"> 
                @foreach($packages as $package)
                    <div class="col-md-3 subscription">
                        <div class="panel-header">
                            <span class="badge badge-secondary">{{$package->name}}</span> <h5 class="text-info">$  {{$package->price}}</h5>
                        </div>
                        <div class="panel-body">
                            <aside>Number of Product : {{$package->product_number}}</aside> 
                            <aside> Number of Day: {{$package->day_number}}</aside> 
                            <aside> Type: {{$package->type}}</aside> 
                            @if($subscription)
                                <form action="{{url('/shop-owner/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                    {{csrf_field()}}
                                    <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                    <input type="submit" class="btn btn-sm btn-secondary btn-block" value="Subscribe" {{$package->id==$subscription->package_id?'disabled':''}}>
                                </form>
                            @else
                                <form action="{{url('/shop-owner/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                    {{csrf_field()}}
                                    <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                    <input type="submit" class="btn btn-sm btn-secondary btn-block" value="Subscribe">
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div><br>
    </div>
</div>
@endsection