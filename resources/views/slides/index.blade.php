@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Slide List&nbsp;&nbsp;
                        <a href="{{url('/slide/create')}}" class="btn btn-link btn-sm">
                             New
                        </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($slides as $sli)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$sli->name}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$sli->photo}}" width="65"/></td>
                                    <td>
                                        <a href="{{url('/slide/edit/'.$sli->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
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