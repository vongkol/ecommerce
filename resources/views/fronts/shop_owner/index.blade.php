@extends('layouts.shop_owner')
@section('content')
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
                    <form action="{{url('/shop-owner/save-password')}}" accept-charset="UTF-8" method="post" onsubmit="check(event)">
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
</div><br>
@endsection