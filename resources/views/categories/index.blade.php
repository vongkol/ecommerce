@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Category List&nbsp;&nbsp;
                    <a href="{{url('/category/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($categories as $cat)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->parent_name}}</td>
                                <td>
                                    <img src="{{asset('uploads/icons/'.$cat->icon)}}" width="36">
                                </td>
                                <td>
                                    <a href="{{url('/category/edit/'.$cat->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/category/delete/'.$cat->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection