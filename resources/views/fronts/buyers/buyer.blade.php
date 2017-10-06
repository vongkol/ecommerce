@extends('layouts.front')
@section('content')
    <div class="header-margin"></div>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="panel panel-default border-radius-none">
                <div class="panel-heading">
                    <span class="orange bold">Manage Account</span>
                </div>
                <div class="panel-body">
                    <p><a href="">Product</a></p>
                    <p><a href="">Customer Order</a></p>
                    <p><a href="">Manage Catogry</a></p>
                    <p><a href=""><span class="orange">Manage Name Shop</span></a></p>
                    <p><a href="">Customer Name</a></p>
                    <p><a href="">Change Password</a></p><hr>
                    <p><a href="">Sing Out</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9">
        <div class="panel panel-default border-radius-none">
            <div class="panel-heading">Product</div>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <i class="fa fa-eye"></i>
                                <i class="fa fa-pencil-square"></i> 
                                <i class="fa fa-trash-o"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>
                                <i class="fa fa-eye"></i>
                                <i class="fa fa-pencil-square"></i> 
                                <i class="fa fa-trash-o"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa fa-eye"></i>
                                <i class="fa fa-pencil-square"></i> 
                                <i class="fa fa-trash-o"></i>
                            </td>
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection