@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Shop Owner List&nbsp;&nbsp;
                    <a href="{{url('/shop-owner/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero; ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @php($i=1) -->
                            @foreach($shop_owners as $sho)
                                <tr>
                                    <td>{{$sho->id}}</td>
                                    <td>{{$sho->first_name}}</td>
                                    <td>{{$sho->last_name}}</td>
                                    <td>{{$sho->gender}}</td>
                                    <td>{{$sho->dob}}</td>
                                    <td>{{$sho->phone}}</td>
                                    <td>{{$sho->email}}</td>
                                    <td>{{$sho->username}}</td>
                                    <td>
                                        <a href="{{url('/shop-owner/edit/'.$sho->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/shop-owner/delete/'.$sho->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $shop_owners->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection