@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Category&nbsp;&nbsp;
                    <a href="{{url('/category')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/category/update')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$categories->id}}">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">Name</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="name" id="name" class="form-control"  value="{{$categories->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent" class="control-label col-lg-1 col-sm-2">Parent</label>
                            <div class="col-lg-6 col-sm-8">
                                <select class="form-control" name="parent" id="parent"  id="exampleSelect1">
                                    <option value="0"> </option>
                                    <?php foreach ($cat as $c): ?>
                                        <option value="{{$c->id}}" {{$c->id==$categories->parent_id?'selected':''}}>
                                            {{$c->name}}
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="control-label col-lg-1 col-sm-2">Icon Image</label>
                            <div class="col-lg-6 col-sm-8">           
                                <input type="file" class="form-control" id="icon" name="icon">
                                <br>
                                <img src="{{asset('uploads/icons/'.$categories->icon)}}" alt="" width="72">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection