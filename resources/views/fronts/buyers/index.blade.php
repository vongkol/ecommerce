@extends('layouts.front')
@section('content')
<div class="group-buyer">
    <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><img src="{{asset('front/img/login.png')}}" width="15"> Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><img src="{{asset('front/img/item.png')}}" width="15"> Item</a>
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
                            <td>{{session('customer')->first_name}}</td>
                            <td>{{session('customer')->last_name}}</td>
                            <td>{{session('customer')->phone}}</td>
                            <td>{{session('customer')->email}}</td>
                            <td>
                                <a href="{{url('/buyer/profile/edit')}}"><button class="btn btn-sm">Edit Profile</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="reset-pass">
                    <form action="{{url('/buyer/service/update')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
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
  <div class="tab-pane" id="profile" role="tabpanel">...</div>
</div>
@endsection